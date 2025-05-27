<?php
require_once "koneksi.php";

class Todolist
{
    public function getAllTodolist()
    {
        global $koneksi;
        $query = "SELECT * FROM todolist";
        $result = $koneksi->query($query);
        $data = array(); 
        while ($row = mysqli_fetch_object($result)) {
            $data[] = $row;
        }

        $response = array(
            'status' => 200,
            'message' => 'Success',
            'data' => $data
        );

        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function getTodolist($id)
    {
        global $koneksi;
        $query = "SELECT * FROM todolist";
        if ($id != 0) {
            $query .= " WHERE id=" . $id . " LIMIT 1";
        }
        $result = $koneksi->query($query);
        $data = array(); 
        $data[] = mysqli_fetch_object($result);

        $response = array(
            'status' => 200,
            'message' => 'Success',
            'data' => $data
        );

        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function addTodolist()
    {
        global $koneksi;
        $arrcheckpost = array(
            'title' => '',
            'description' => '',
            'priority' => '',
        );

        $hitung = count(array_intersect_key($_POST, $arrcheckpost));

        if ($hitung == count($arrcheckpost)) {
            $result = mysqli_query($koneksi, "INSERT INTO todolist SET title = '$_POST[title]', description = '$_POST[description]', priority = '$_POST[priority]'");
            if ($result) {
                $response = array(
                    'status' => 200,
                    'message' => 'Success'
                );
            } else {
                $response = array(
                    'status' => 500,
                    'message' => 'Internal server error.'
                );
            }
        } else {
            $response = array(
                'status' => 404,
                'message' => 'Bad Request',
                'error' => "Form data did not match!"
            );
        }

        header('Content-Type: application/json');
        echo json_encode($response);
    }

    function updateTodolist($id)
    {
        global $koneksi;
        $arrcheckpost = array(
            'title' => '',
            'description' => '',
            'priority' => '',
        );

        $hitung = count(array_intersect_key($_POST, $arrcheckpost));

        if (empty($id)) {
            $response = [
                'status' => 400,
                'message' => 'Bad Request',
                'error' => 'Masukkan parameter ID'
            ];
            header('Content-Type: application/json');
            echo json_encode($response);
            return;
        }

        if ($hitung == count($arrcheckpost)) {
            $result = mysqli_query($koneksi, "UPDATE todolist SET title = '$_POST[title]', description = '$_POST[description]', priority = '$_POST[priority]' WHERE id = $id");
            if ($result) {
                $response = array(
                    'status' => 200,
                    'message' => 'Success'
                );
            } else {
                $response = array(
                    'status' => 500,
                    'message' => 'Internal server error.',
                    'error' => 'Internal server error.'
                );
            }
        } else {
            $response = array(
                'status' => 400,
                'message' => 'Bad Request',
                'error' => 'Parameter Do Not Match'
            );
        }

        header('Content-Type: application/json');
        echo json_encode($response);
    }

    function deleteTodolist($id)
    {
        global $koneksi;
        $query = "DELETE FROM todolist WHERE id=" . $id;
        if (mysqli_query($koneksi, $query)) {
            $response = array(
                'status' => 200,
                'message' => 'Success'
            );
        } else {
            $response = array(
                'status' => 500,
                'message' => 'Internal server error.',
                'error' => 'Internal server error.'
            );
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
}