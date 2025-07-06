<?php
class DB
{
    public $conn;
    function __construct()
    {
    	$this->conn = mysqli_connect(LOCALHOST, USERNAME, PASSWORD) or die('Could not connect database');
		mysqli_select_db($this->conn, DATABASE) or die("Could not select database");
		mysqli_query($this->conn, "SET NAMES 'utf8'");
    }
    public function close()
    {
        if ($this->conn)
        {
            mysqli_close($this->conn);
        }
    }
    public function query($sql = null) 
    {       
        if ($this->conn)
        {
            mysqli_query($this->conn, $sql);
        }
    }
    public function real_escape_string($sql = null) 
    {
        if ($this->conn) return mysqli_real_escape_string($this->conn, $sql);
    }
    public function num_rows($sql = null) 
    {
        if ($this->conn)
        {
            $query = mysqli_query($this->conn, $sql);
            if ($query)
            {
                $row = mysqli_num_rows($query);
                return $row;
            }   
        }       
    }
    public function fetch_row($sql = null) 
    {
        if ($this->conn)
        {
            $query = mysqli_query($this->conn, $sql);
            if ($query)
            {
                $row = $query->fetch_row();
                return $row[0];
            }   
        }       
    }
    public function fetch_assoc($sql = null, $type)
    {
        if ($this->conn)
        {
            $query = mysqli_query($this->conn, $sql);
            if ($query)
            {
                if ($type == 0)
                {
                    while ($row = mysqli_fetch_assoc($query))
                    {
                        $data[] = $row;
                    }
                    return $data;
                }
                else if ($type == 1)
                {
                    $data = mysqli_fetch_assoc($query);
                    return $data;
                }
            }       
        }
    }
    public function insert_id()
    {
        if ($this->conn)
        {
            $count = mysqli_insert_id($this->conn);
            if ($count == '0')
            {
                $count = '1';
            }
            else
            {
                $count = $count;
            }
            return $count;
        }
    } 
}
 
?>