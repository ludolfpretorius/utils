<?php
    function query($pdo, $sql, $paramsArr, $returnSomethingBool = true, $multipleRows = false) {
        $res = null;
        try {
            $stmt = $pdo->prepare($sql);
            $stmt->execute($paramsArr);

            if ($returnSomethingBool) {
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $multipleRows ? $res = $stmt->fetchAll() : $res = $stmt->fetch();
            } else {
                $res = 'Success';
            }
            $stmt->closeCursor();

        } catch(PDOException $e) {
            return 'Error: 901 '.$e;
        }
        return $res;
    }

    function closeConnection($pdo) {
        $pdo = null;
    }