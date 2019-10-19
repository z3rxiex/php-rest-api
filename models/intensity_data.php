<?php

    class IntensityData {
        // DB Stuff
        private $conn;
       
        // Constructor 
        public function __construct($db) {
            $this->conn = $db;
        }

        // Get Stations
        public function read($selected_date) {

            
           //Query
           $query = 'SELECT station.id id, station.StnCode code, station.StnName name, station.MAC mac, ' .
                        'station.Latitude latitude, station.Longitude longitude, station.Elevation elevation, ' .
                        'station.Dzongkhag location, station.DateInstalled date_installed, ' .
                        'CASE WHEN main.HR0_id IS NULL THEN 1 ELSE 0 END HR0_status, CASE WHEN data0.UpdateCount IS NULL THEN 0 ELSE data0.UpdateCount END UpdateCount0, ' .
                        'CASE WHEN main.HR1_id IS NULL THEN 1 ELSE 0 END HR1_status, CASE WHEN data1.UpdateCount IS NULL THEN 0 ELSE data1.UpdateCount END UpdateCount1, ' .
                        'CASE WHEN main.HR2_id IS NULL THEN 1 ELSE 0 END HR2_status, CASE WHEN data2.UpdateCount IS NULL THEN 0 ELSE data2.UpdateCount END UpdateCount2, ' .
                        'CASE WHEN main.HR3_id IS NULL THEN 1 ELSE 0 END HR3_status, CASE WHEN data3.UpdateCount IS NULL THEN 0 ELSE data3.UpdateCount END UpdateCount3, ' .
                        'CASE WHEN main.HR4_id IS NULL THEN 1 ELSE 0 END HR4_status, CASE WHEN data4.UpdateCount IS NULL THEN 0 ELSE data4.UpdateCount END UpdateCount4, ' .
                        'CASE WHEN main.HR5_id IS NULL THEN 1 ELSE 0 END HR5_status, CASE WHEN data5.UpdateCount IS NULL THEN 0 ELSE data5.UpdateCount END UpdateCount5, ' .
                        'CASE WHEN main.HR6_id IS NULL THEN 1 ELSE 0 END HR6_status, CASE WHEN data6.UpdateCount IS NULL THEN 0 ELSE data6.UpdateCount END UpdateCount6, ' .
                        'CASE WHEN main.HR7_id IS NULL THEN 1 ELSE 0 END HR7_status, CASE WHEN data7.UpdateCount IS NULL THEN 0 ELSE data7.UpdateCount END UpdateCount7, ' .
                        'CASE WHEN main.HR8_id IS NULL THEN 1 ELSE 0 END HR8_status, CASE WHEN data8.UpdateCount IS NULL THEN 0 ELSE data8.UpdateCount END UpdateCount8, ' .
                        'CASE WHEN main.HR9_id IS NULL THEN 1 ELSE 0 END HR9_status, CASE WHEN data9.UpdateCount IS NULL THEN 0 ELSE data9.UpdateCount END UpdateCount9, ' .
                        'CASE WHEN main.HR10_id IS NULL THEN 1 ELSE 0 END HR10_status, CASE WHEN data10.UpdateCount IS NULL THEN 0 ELSE data10.UpdateCount END UpdateCount10, ' .
                        'CASE WHEN main.HR11_id IS NULL THEN 1 ELSE 0 END HR11_status, CASE WHEN data11.UpdateCount IS NULL THEN 0 ELSE data11.UpdateCount END UpdateCount11, ' .
                        'CASE WHEN main.HR12_id IS NULL THEN 1 ELSE 0 END HR12_status, CASE WHEN data12.UpdateCount IS NULL THEN 0 ELSE data12.UpdateCount END UpdateCount12, ' .
                        'CASE WHEN main.HR13_id IS NULL THEN 1 ELSE 0 END HR13_status, CASE WHEN data13.UpdateCount IS NULL THEN 0 ELSE data13.UpdateCount END UpdateCount13, ' .
                        'CASE WHEN main.HR14_id IS NULL THEN 1 ELSE 0 END HR14_status, CASE WHEN data14.UpdateCount IS NULL THEN 0 ELSE data14.UpdateCount END UpdateCount14, ' .
                        'CASE WHEN main.HR15_id IS NULL THEN 1 ELSE 0 END HR15_status, CASE WHEN data15.UpdateCount IS NULL THEN 0 ELSE data15.UpdateCount END UpdateCount15, ' .
                        'CASE WHEN main.HR16_id IS NULL THEN 1 ELSE 0 END HR16_status, CASE WHEN data16.UpdateCount IS NULL THEN 0 ELSE data16.UpdateCount END UpdateCount16, ' .
                        'CASE WHEN main.HR17_id IS NULL THEN 1 ELSE 0 END HR17_status, CASE WHEN data17.UpdateCount IS NULL THEN 0 ELSE data17.UpdateCount END UpdateCount17, ' .
                        'CASE WHEN main.HR18_id IS NULL THEN 1 ELSE 0 END HR18_status, CASE WHEN data18.UpdateCount IS NULL THEN 0 ELSE data18.UpdateCount END UpdateCount18, ' .
                        'CASE WHEN main.HR19_id IS NULL THEN 1 ELSE 0 END HR19_status, CASE WHEN data19.UpdateCount IS NULL THEN 0 ELSE data19.UpdateCount END UpdateCount19, ' .
                        'CASE WHEN main.HR20_id IS NULL THEN 1 ELSE 0 END HR20_status, CASE WHEN data20.UpdateCount IS NULL THEN 0 ELSE data20.UpdateCount END UpdateCount20, ' .
                        'CASE WHEN main.HR21_id IS NULL THEN 1 ELSE 0 END HR21_status, CASE WHEN data21.UpdateCount IS NULL THEN 0 ELSE data21.UpdateCount END UpdateCount21, ' .
                        'CASE WHEN main.HR22_id IS NULL THEN 1 ELSE 0 END HR22_status, CASE WHEN data22.UpdateCount IS NULL THEN 0 ELSE data22.UpdateCount END UpdateCount22, ' .
                        'CASE WHEN main.HR23_id IS NULL THEN 1 ELSE 0 END HR23_status, CASE WHEN data23.UpdateCount IS NULL THEN 0 ELSE data23.UpdateCount END UpdateCount23,' .
                        'CASE WHEN main.LatestLog IS NULL THEN \'\' ELSE main.LatestLog END LatestLog ' .
                    'FROM intstations station ' .
                    'LEFT OUTER JOIN intensity_main main on station.MAC = main.MAC and main.LogDate = "' . $selected_date . '" ' .
                    'LEFT OUTER JOIN intensity_data data0 on station.MAC = data0.MAC and  main.HR0_id = data0.id ' .
                    'LEFT OUTER JOIN intensity_data data1 on station.MAC = data1.MAC and  main.HR1_id = data1.id ' .
                    'LEFT OUTER JOIN intensity_data data2 on station.MAC = data2.MAC and  main.HR2_id = data2.id ' .
                    'LEFT OUTER JOIN intensity_data data3 on station.MAC = data3.MAC and  main.HR3_id = data3.id ' .
                    'LEFT OUTER JOIN intensity_data data4 on station.MAC = data4.MAC and  main.HR4_id = data4.id ' .
                    'LEFT OUTER JOIN intensity_data data5 on station.MAC = data5.MAC and  main.HR5_id = data5.id ' .
                    'LEFT OUTER JOIN intensity_data data6 on station.MAC = data6.MAC and  main.HR6_id = data6.id ' .
                    'LEFT OUTER JOIN intensity_data data7 on station.MAC = data7.MAC and  main.HR7_id = data7.id ' .
                    'LEFT OUTER JOIN intensity_data data8 on station.MAC = data8.MAC and  main.HR8_id = data8.id ' .
                    'LEFT OUTER JOIN intensity_data data9 on station.MAC = data9.MAC and  main.HR9_id = data9.id ' .
                    'LEFT OUTER JOIN intensity_data data10 on station.MAC = data10.MAC and  main.HR10_id = data10.id ' .
                    'LEFT OUTER JOIN intensity_data data11 on station.MAC = data11.MAC and  main.HR11_id = data11.id ' .
                    'LEFT OUTER JOIN intensity_data data12 on station.MAC = data12.MAC and  main.HR12_id = data12.id ' .
                    'LEFT OUTER JOIN intensity_data data13 on station.MAC = data13.MAC and  main.HR13_id = data13.id ' .
                    'LEFT OUTER JOIN intensity_data data14 on station.MAC = data14.MAC and  main.HR14_id = data14.id ' .
                    'LEFT OUTER JOIN intensity_data data15 on station.MAC = data15.MAC and  main.HR15_id = data15.id ' .
                    'LEFT OUTER JOIN intensity_data data16 on station.MAC = data16.MAC and  main.HR16_id = data16.id ' .
                    'LEFT OUTER JOIN intensity_data data17 on station.MAC = data17.MAC and  main.HR17_id = data17.id ' .
                    'LEFT OUTER JOIN intensity_data data18 on station.MAC = data18.MAC and  main.HR19_id = data18.id ' .
                    'LEFT OUTER JOIN intensity_data data19 on station.MAC = data19.MAC and  main.HR19_id = data19.id ' .
                    'LEFT OUTER JOIN intensity_data data20 on station.MAC = data20.MAC and  main.HR20_id = data20.id ' .
                    'LEFT OUTER JOIN intensity_data data21 on station.MAC = data21.MAC and  main.HR21_id = data21.id ' .
                    'LEFT OUTER JOIN intensity_data data22 on station.MAC = data22.MAC and  main.HR22_id = data22.id ' .
                    'LEFT OUTER JOIN intensity_data data23 on station.MAC = data23.MAC and  main.HR23_id = data23.id';

            //Prepare Statement
            $result = $this->conn->prepare($query);

            //Execute Query
            $result->execute();

            return $result;
        }

    }