<?php

$rows = array(
    array('id' => 1, 'name' => 'Product A', 'price' => 2400, 'comb' => 3),
    array('id' => 2, 'name' => 'Product B', 'price' => 2600, 'comb' => 8),
    array('id' => 3, 'name' => 'Product C', 'price' => 2100, 'comb' => 2),
    array('id' => 4, 'name' => 'Product D', 'price' => 2500, 'comb' => 7)
);

$new_rows = array();

foreach ($rows as $row) {
    $new_row = array(
        'id' => $row['id'],
        'name' => $row['name'],
        'price' => $row['price'],
        'comb' => $row['comb']
    );
    if ($row['comb'] !== 0) {
        $comb_row = $rows[$row['comb'] - 1];
        $new_row['comb_name'] = $comb_row['name'];
    }
    $new_rows[] = $new_row;
}
foreach ($new_rows as $new_row) {

    if (isset($new_row['comb_name']) && isset($rows[$new_row['comb']])) {
        $total_price = $new_row['price'] + $rows[$new_row['comb']]['price'];
        echo $new_row['name'] . ' + ' . $new_row['comb_name'] . ' = ' . $total_price . '<br>';
    } else {       
        echo $new_row['name'] . ' = ' . $new_row['price'] . '<br>';
    }
}