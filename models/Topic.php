<?php
class Topic {
    public function selectTopics ($db) {
        $result = $db->query("
            SELECT
            id,
            topic
            FROM topics
            ORDER BY rand() 
            LIMIT 0,10
            ");
        $topics = array();
        foreach ($result as $row) {
            $topics[] = $row['id'];
        }
        return $topics;
    }
}
