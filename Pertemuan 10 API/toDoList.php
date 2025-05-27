<?php
require_once "TodoClass.php";
$todolist = new Todolist();
$request_method = $_SERVER["REQUEST_METHOD"];

switch ($request_method) {
    case 'GET':
        if (empty($_GET["id"])) {
            $todolist->getAllTodolist();
        } else {
            $id = intval($_GET["id"]);
            $todolist->getTodolist($id);
        }
        break;

    case 'POST':
        if (!empty($_GET["id"])) {
            $id = intval($_GET["id"]);
            $todolist->updateTodolist($id);
        } else {
            $todolist->addTodolist();
        }
        break;

    case 'DELETE':
        if (empty($_GET['id'])) {
            $response = [
                'status' => 400,
                'message' => 'Bad Request',
                'error' => 'Masukkan parameter ID'
            ];
            header('Content-Type: application/json');
            echo json_encode($response);
            break;
        }
        $id = intval($_GET["id"]);
        $todolist->deleteTodolist($id);
        break;
    default:
        header("Content-Type: application/json");
        echo json_encode([
            'status' => 405,
            'message' => 'Method Not Allowed'
        ]);
        break;
}