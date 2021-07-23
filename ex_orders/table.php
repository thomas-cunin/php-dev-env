<table class="block">
    <thead>
        <tr>
            <th colspan="5">Orders list</th>
        </tr>
        <tr>
            <td style="text-align: center"><strong>Order date</strong></td>
            <td style="text-align: center"><strong>Order number</strong></td>
            <td style="text-align: center"><strong>Order status</strong></td>
            <td style="text-align: center"><strong>Customer name</strong></td>
            <td style="text-align: center"><strong>Link</strong></td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($ordersFiltered as $order) : ?>
        <tr>
            <td><?php echo $order['orderDate']?></td>
            <td style=""><?php echo $order['orderNumber']?></td>
            <td><?php echo $order['status']?></td>
            <td style=""><?php echo $order['customerName']?></td>
            <td style="text-align: center"><a href= <?="./order.php?orderNumber=". $order['orderNumber'] ?>><strong>See more...</strong></a></td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>