<?php

class Str
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    private function detect(string $str)
    {
        if (preg_match("/[А-Яа-я]/", $str)) {
            return "эта строка содержит кириллицу";
        }

        return "this string contains only Latin letters";
    }

    private function saveToDatabase(string $str, string $result)
    {
        $stmt = $this->pdo->prepare("INSERT INTO users_texts (content) VALUES (:result)");

        $res = $str . ' ' . $result;
        $stmt->execute([
            ':result' => $res
        ]);
    }

    public function getRes($str)
    {
        if (is_numeric($str)) {
            return 'You entered numbers. I need only letters';
        }

        $result = $this->detect($str);
        $this->saveToDatabase($str, $result);

        return $result;
    }
}
