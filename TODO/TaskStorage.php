<?php


class TaskStorage
{
    private $resource;

    private array $tasks;

    public function __construct()
    {
        $this->resource = fopen('todo.csv', 'rwb+');

        $this->loadPersonData();

        fclose($this->resource);
    }

    private function loadPersonData(): array
    {
        $tasks = [];

        while (!feof($this->resource)) {

            $task = array_filter((array)fgetcsv($this->resource));

            if (!empty($task)) {
                $this->tasks[] = new Task(
                    (string)$task[0],
                    (float)$task[1],
                );
            }
        }
        return $tasks;
    }

    public function getTasks(): array
    {
        return $this->tasks;
    }

    public function saveToFile(array $data, string $record): void
    {
        $this->resource = fopen('todo.csv', 'rwb+');

        $this->loadPersonData();

        if ($record === 'addtask') {
            fputcsv($this->resource, $data);
        }

        fclose($this->resource);
    }

    public function removeTask(float $taskId)
    {
        $this->resource = fopen('todo.csv', 'rwb+');

        if ($this->resource) {

            $row = 0;

            while (($line = fgets($this->resource)) !== false) {
                $taskArray = explode(',', $line);
                if ($taskId === $taskArray[1]) {
                    break;
                }
                $row++;
            }
            fclose($this->resource);

            $fileOut = file('todo.csv');
            unset($fileOut[$row]);
            file_put_contents('todo.csv', implode('', $fileOut));
        } else {
            echo 'error opening the file.';
        }
    }
}