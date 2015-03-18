<?php
$data = $dataProvider->getData();
?>
<!--<div class="wrapper" style="margin: 5em; font-size: 20px;">-->
    <?php // CVarDumper::dump($data, 20, true)?>
    <table>
        <tbody style="margin: 5em; font-size: 20px;">
            <tr>
                <td><?php echo 'HN: ' . $data['hn'] ." / ". 'RN: ' . $data['rn']; ?></td>
            </tr>
            <tr>
                <td><?php echo 'ชื่อ: ' . $data['new_title'] . " " . $data['name'] ." ". $data['surname']?></td>
            </tr>
            <tr>
                <td><?php echo 'อายุ: ' . $data['new_age']; ?></td>
            </tr>
        </tbody>
    </table>
<!--</div>-->
