<?php
class sqliteHelper extends SQLite3
{
    // Constructor
    public function __construct()
    {

    }

    public function connectToDB($filename)
    {
        $this->open($filename);
    }

    public function getQuery($sql,$print = false)
    {
        if($print == true)
        {
            echo $sql;
        }

        if($result = $this->query($sql))
        {
            return $result;
        }
        else
        {
//            if($_SERVER['REMOTE_ADDR'] = '127.0.0.1')
//            {
//                echo '<strong>Function Backtrace</strong> :<br><br> ';
//                $debug = debug_backtrace();
//                $line_hash = 0;
//                foreach($debug as $data)
//                {
//                    echo '</br>#'.$line_hash.' '.$data['class'].'->'.$data['function'].'('.implode(",",$data['args']).')'.' called at ['.$data['file'].':'.$data['line'].']';
//                    $line_hash++;
//                }
//
//                echo '</br></br><strong>MySQL Error</strong> : ';
//                echo $this->db->error;
//                die();
//            }
//            else
//            {
//                die('There was an error running the query [' . $this->db->error . ']');
//            }
        }
    }

    public function select($db_table_name, $select_array  = NULL, $where_assoc = NULL , $logical = 'AND' , $print = false , $extra = '' )
    {
        if(empty($db_table_name))
        {
            die('The Query Parameters are Insufficient');
        }
        $query = 'SELECT ';
        if (sizeof($select_array) == 0)
        {
            $query .= '* ';
        }
        else
        {
            $query .= implode(',', $select_array);
        }
        $query .= ' FROM ' . $db_table_name;

        if (sizeof($where_assoc) > 0)
        {
            $query .= ' WHERE ';
            $var = TRUE;
            foreach ($where_assoc as $key => $value)
            {
                if (is_string($value))
                {
                    $value = $this->db->real_escape_string($value);
                    $value = '\'' . $value . '\'';
                }
                if ($var == TRUE)
                {
                    $query .= $key . ' = ' . $value;
                    $var = FALSE;
                }
                else
                {
                    $query .= ' '.$logical.' ' . $key . ' = ' . $value;
                }
            }
        }
        $query = $query .' '. $extra .';';
        if($print == true)
        {
            echo $query;
        }
        return $this->getQuery($query);
    }

    public function insert($db_table_name,$value_assoc, $print = false)
    {
        if(empty($db_table_name) || empty($value_assoc))
        {
            die('The Query Parameters are Insufficient');
        }
        $query = 'INSERT INTO '.$db_table_name.' ( ';
        $var = true;
        foreach ($value_assoc as $key => $value)
        {
            if($var ==true)
            {
                $query .= ' `'.$key.'` ';
                $var = false;
            }
            else
            {
                $query .= ' ,`'.$key.'` ';
            }
        }

        $escaped_value_assoc = array();
        foreach ($value_assoc as $key => $value)
        {
            $escaped_value_assoc[$key] = $this->db->real_escape_string($value_assoc[$key]);
        }

        $query .= ') VALUES (\'';
        $query .= implode('\',\'', $escaped_value_assoc);

        $query = $query . '\');';
        return $this->getQuery($query,$print);
    }


    public function update($db_table_name,$value_assoc,$where_assoc = NULL , $logical = 'AND' , $print = false)
    {
        if(empty($db_table_name) || empty($value_assoc))
        {
            die('The Query Parameters are Insufficient');
        }

        $query = 'UPDATE '.$db_table_name.' SET ';
        foreach($value_assoc as $key => $value)
        {
            $query .= '`'.$key.'` = ';
            if (is_string($value))
            {
                $value = $this->db->real_escape_string($value);
                $value = '\'' . $value . '\'';
            }
            $query .= $value.',';

        }
        $query = substr($query , 0 , strlen($query)-1);
        if (sizeof($where_assoc) > 0)
        {
            $query .= ' WHERE ';
            $var = TRUE;
            foreach ($where_assoc as $key => $value)
            {
                if (is_string($value))
                {
                    $value = $this->db->real_escape_string($value);
                    $value = '\'' . $value . '\'';
                }
                if ($var == TRUE)
                {
                    $query .= $key . ' = ' . $value;
                    $var = FALSE;
                }
                else
                {
                    $query .= ' '.$logical.' ' . $key . ' = ' . $value;
                }
            }
        }
        $query = $query . ';';
        return $this->getQuery($query,$print);
    }

    public function delete($db_table_name,$where_assoc = NULL , $logical = 'AND' , $print = false)
    {
        if(empty($db_table_name))
        {
            die('The Query Parameters are Insufficient');
        }

        $query = 'DELETE FROM '.$db_table_name;
        if (sizeof($where_assoc) > 0)
        {
            $query .= ' WHERE ';
            $var = TRUE;
            foreach ($where_assoc as $key => $value)
            {
                if (is_string($value))
                {
                    $value = $this->db->real_escape_string($value);
                    $value = '\'' . $value . '\'';
                }
                if ($var == TRUE)
                {
                    $query .= $key . ' = ' . $value;
                    $var = FALSE;
                }
                else
                {
                    $query .= ' '.$logical.' ' . $key . ' = ' . $value;
                }
            }
        }
        $query = $query . ';';
        return $this->getQuery($query,$print);
    }

    public function ud_mysql_fetch_assoc_all($result)
    {
        $array = array();
        $count = 0;
        while(($data = $result->fetchArray(SQLITE3_ASSOC))!= NULL)
        {
            $array[$count++] = $data;
        }
        return $array;
    }

//    public function ud_timestamp()
//    {
//        $time = time();
//        $date = date('Y-m-d H:i:s',$time);
//        return $date;
//    }
//
//
//    public function ud_getRowCountResult($result)
//    {
//        return $result->num_rows;
//    }
//
//    public function ud_getRowCountQuery($sql)
//    {
//        $result = $this->ud_getQuery($sql);
//        return $this->ud_getRowCountResult($result);
//    }
}
?>