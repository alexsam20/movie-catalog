<h1>Hello Main/index</h1>
<?php if (!empty($countries)): ?>
<table>
    <tr>
        <td>Name</td>
        <td>Capital City</td>
        <td>Flag</td>
    </tr>
    <?php foreach ($countries as $country): ?>
        <tr>
            <td><?php echo $country['name']; ?></td>
            <td><?php echo $country['capital']; ?></td>
            <td><?php echo $country['emoji']; ?></td>
        </tr>
    <?php endforeach; ?>
    </table>
<?php endif; ?>
