<?php
    $parameters = array();
    $type = "json";
    $pathtosave = ".";
    $workers = array("name" => "Иван",
                     "position"=> "Директор",
                     "employees"=> [
                        "name" => "Андрей",
                        "position"=> "Зам. Директор",
                        "employees"=> [
                            [
                            "name" => "Максим",
                            "position"=> "Дворник",
                            ],
                            [
                                "name" => "Алексей",
                                "position"=> "Охранник",
                            ],
                        ],
                    ]
                    );
    try {
        for ($i = 1; $i <= $argc - 1 ; $i++) {
            list($key, $val) = explode('=', $argv[$i]);
            $parameters = array($key=>$val);
            // var_dump($parameters);

            switch ($key) {
                case '--type':
                    $parameters[$key] = mb_strtolower($parameters[$key]);
                    switch ($parameters[$key]){
                        case 'json':
                            print("Make json file \n");
                            $type = "json";
                            break;
                        case 'xml':
                            print("Make xml file \n");
                            $type = "xml";
                            break;
                        case 'csv':
                            print("Make csv file \n");
                            $type = "csv";
                            break;
                        default:
                            exit("Error: Invalid file type \nChoose one of thene 'xml', 'csv' or 'json'\n");
                    }
                    break;
                
                case '--output':
                        if (!empty( $parameters[$key] )) {
                            $pathtosave = $parameters[$key];
                            if (!is_dir($pathtosave)){
                                mkdir($pathtosave,0777, true);
                            }
                    }
                    else {
                        $pathtosave = '.';
                    }
                    
                    break;  
            }
        }

        $myfile = fopen("$pathtosave/export.$type", "w+");
        $txt = json_encode($workers, JSON_UNESCAPED_UNICODE);
        print($txt);
        fwrite($myfile, $txt);
        fclose($myfile);

        $xml = new SimpleXMLElement('<root/>');
        // $workers = array_flip($workers);
        array_walk_recursive($workers, array ($xml, 'addChild'));
        print $xml->asXML();
        
        $myfile = fopen("xml/export.xml", "w+");
        fwrite($myfile, $xml->asXML());
        fclose($myfile);

        $fp = fopen('persons.csv', 'w'); 
        
        // Loop through file pointer and a line 
        // foreach ($workers as $fields) { 
        fputcsv($fp, $workers, " "); 
        // } 
        
        fclose($fp); 

    } catch (Exception $e) {
        print('Error: '. $e->getMessage());
    }

    print("Path to save file: .$pathtosave/export.$type \n");

    var_dump($workers);
?>