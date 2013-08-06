<?
    $tidy = tidy_parse_file("http://www.foodpro.huds.harvard.edu/foodpro/menu_items.asp?date=12-2-2009&type=30&meal=2", array("numeric-entities" => true, "output-xhtml" => true));
    $tidy->cleanRepair();
    $xhtml = (string) $tidy;
    
    $dom = simplexml_load_string($xhtml);
    
    $dom->registerXPathNamespace("xhtml", "http://www.w3.org/1999/xhtml");
    $trs = $dom->xpath("//xhtml:form[@id='report_form']/xhtml:table/xhtml:tr");
    
    unset($category);
    
    foreach ($trs as $tr)
    {
        // remember category
        if ($tr["class"] == "category")
            $category = trim((string) $tr->td);

        // skip leading category-less TRs
        else if (!isset($category))
            continue;
            
        // associate item with current category
                else
                {   
                    // get item
                    $a = $tr->td->div->span->a;
                    if (!($item = trim($a)))
                        continue;

                    // determine recipe
                    if (!preg_match("/recipe=(\d+)/", $a["href"], $matches))
                        continue;
                    $recipe = $matches[1];

                    // INSERT INTO into items
                    $sql = sprintf("INSERT IGNORE INTO items (recipe, item) VALUES('%s', '%s')",
                                   mysql_real_escape_string($recipe),
                                   mysql_real_escape_string($item));
                    mysql_query($sql);

                    // INSERT INTO legend
                    $a->registerXPathNamespace("xhtml", "http://www.w3.org/1999/xhtml");
                    foreach ($a->xpath("../../xhtml:img") as $img)
                    {
                        $sql = sprintf("INSERT IGNORE INTO legend (recipe, `key`) VALUES('%s', '%s')",
                                       mysql_real_escape_string($recipe),
                                       mysql_real_escape_string($img["alt"]));
                        mysql_query($sql);
                    }

                    // INSERT INTO menu
                    $sql = sprintf("INSERT INTO menu (date, meal, category, recipe) VALUES('%s', '%s', '%s', '%s')",
                                   mysql_real_escape_string($Ymd),
                                   mysql_real_escape_string($meals[$i]),
                                   mysql_real_escape_string($category),
                                   mysql_real_escape_string($recipe));
                    mysql_query($sql);
                }
            

            // avoid blacklisting
            sleep(1);
    }

    



?>
