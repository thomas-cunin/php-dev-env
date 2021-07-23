<table style="margin-top: 5rem">
    <thead>
        <tr>
            <th colspan="6">Products ordered information</th>
        </tr>
        <tr>
            <td style="text-align: center"></td>
            <td style="text-align: center"><strong>Product code</strong></td>
            <td style="text-align: center"><strong>Product name</strong></td>
            <td style="text-align: center"><strong>Quantity ordered</strong></td>
            <td style="text-align: center"><strong>Price each</strong></td>
            <td style="text-align: center"><strong>Total price for this product</strong></td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($orderDetails as $details) : ?>
        <tr>
            <td>
                <?php $search_keyword=$details['productName'] . " scale model";
                $search_keyword=str_replace(' ','+',$search_keyword);
                $newhtml =file_get_html("https://www.google.com/search?q=".$search_keyword."&tbm=isch");
                $result_image_source = $newhtml->find('img', 10)->src;
                echo '<img src="'.$result_image_source.'">';
                ?>
            </td>
            <td><?php echo $details['productCode']?></td>
            <td style=""><?php echo $details['productName']?></td>
            <td><?php echo $details['quantityOrdered']?></td>
            <td style=""><?php echo $details['priceEach'] . "$"?></td>
            <td><?= $details['priceEach'] * $details['quantityOrdered']."$"?> </td>
        </tr>
        <?php array_push($totalPriceList, $details['priceEach'] * $details['quantityOrdered']);?>
        <?php endforeach ?>
    </tbody>
    <tfoot>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td style="text-align: right"><strong>Total price :</strong></td>
            <td style="text-align: center"><strong><?= array_sum($totalPriceList)."$"?> </strong></td>
        </tr>
    </tfoot>
</table>
