<?php
class database
{
    // tao  ket noi den co so du lieu
    public function connect()
    {
        $host = "localhost";
        $user = "root";
        $pass = "";
        $db_name = "mvc";
        $conn = mysqli_connect($host, $user, $pass, $db_name);
        mysqli_set_charset($conn, 'utf8');
        return $conn;
    }
    // huy ket noi co so du lieu
    public function closeConnect($conn)
    {
        mysqli_close($conn);
    }
    // thuc thi cau lenh select
    public function select($query)
    {
        $conn = $this->connect();
        $result = $conn->query($query);
        $data = [];
        while ($row = $result->fetch_array()) {
            $data[] = $row;
        }
        /*
        mang 1 chieu = [1, 2, 3, 4, 5, 6, 7, 8]
        mang 2 chieu = 
        [
            [1, 2, 3, 4, 5, 6, 7, 8],
            [1, 2, 3, 4, 5, 6, 7, 8],
            [1, 2, 3, 4, 5, 6, 7, 8]
        ]
        $data = [$row, $row]
        */
        $this->closeConnect($conn);
        return $data;
    }
    //
    public function insert($query)
    {
        $conn = $this->connect();
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $row = $stmt->affected_rows;
        $stmt->close();
        $this->closeConnect($conn);
        return $row;
    }
    //
    public function update($query)
    {
        $conn = $this->connect();
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $row = $stmt->affected_rows;
        $stmt->close();
        $this->closeConnect($conn);
        return $row;
    }
}
