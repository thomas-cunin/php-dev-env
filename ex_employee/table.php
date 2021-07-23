<table class="block">
    <thead>
        <tr>
            <th colspan="7">Employees list</th>
        </tr>
        <tr>
            <td style="text-align: center"><strong>ID</strong></td>
            <td style="text-align: center"><strong>Last name</strong></td>
            <td style="text-align: center"><strong>First name</strong></td>
            <td style="text-align: center"><strong>Email</strong></td>
            <td style="text-align: center"><strong>Job title</strong></td>
            <td style="text-align: center"><strong>Office code</strong></td>
            <td style="text-align: center"><strong>Link</strong></td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($employees as $employee) : ?>
        <tr>
            <td><?php echo $employee['employeeNumber']?></td>
            <td style=""><?php echo $employee['lastName']?></td>
            <td><?php echo $employee['firstName']?></td>
            <td style=""><?php echo $employee['email']?></td>
            <td style=""><?php echo $employee['jobTitle']?></td>
            <td style=""><?php echo $employee['officeCode']?></td>
            <td style="text-align: center"><a href= <?="./show_employee.php?id=". $employee['employeeNumber'] ?>><strong>See more...</strong></a></td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>