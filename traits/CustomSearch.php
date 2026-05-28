<?php

trait CustomSearch {
    protected function filtered(array $columns, string $search): array {
        $where = '';
        $params = array();

        $search = trim($search);

        if ($search !== '' && !empty($columns)) {
            $conditions = array();

            foreach ($columns as $index => $column) {
                $param = ':search_'.$index;
                $conditions[] = "$column LIKE $param";
                $params[$param] = '%'.$search.'%';
            }

            $where = ' WHERE '.implode(' OR ', $conditions);
        }

        return array(
            'where' => $where,
            'params' => $params
        );
    }
}