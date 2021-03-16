<form action="<?=$_SERVER['PHP_SELF']?>" method="get">
    <input type="hidden" name="action" value="viewVehicles"/>
    <select name="Makes" id="makes">
        <option value="" selected>View All Makes</option>
        <?php $makes = get_makes();?>
        <?php foreach ($makes as $make) : ?>
            <option value=<?=$make['ID']?>><?=$make['Make']?> </option>
        <?php endforeach; ?>
    </select>
    <br/>
    <select name="Types" id="types">
        <option value="" selected>View All Types</option>
        <?php $types = get_types();?>
        <?php foreach ($types as $type) : ?>
            <option value=<?=$type['ID']?>><?=$type['Type']?> </option>
        <?php endforeach; ?>
    </select>
    <br/>
    <select name="Classes" id="classes">
        <option value="" selected>View All Classes</option>
        <?php $classes = get_classes();?>
        <?php foreach ($classes as $class) : ?>
            <option value=<?=$class['ID']?>><?=$class['Class']?> </option>
        <?php endforeach; ?>
    </select>

    <div>
        Sort by:
    <input type="radio" id="price" name="sort" value="price" checked="checked">
        <label for="price">Price</label>
    <input type="radio" id="year" name="sort" value="year">
        <label for="year">Year</label>

        <button type="submit" class="button">Submit</button>
    </div>
    <?php $vehicles = get_vehicles((isset($sort)? $sort : null), (isset($filterArray)? $filterArray : null));?>
    <?php  if(empty($vehicles)) { ?>
        <section class="Border">
            <table>
                <tr>
                    <td><div>No vehicles available.</div></td>
                </tr>
            </table>
        </section>
    <?php } else{?>
    <table>
        <section>
                <table>
                    <thead>
                        <th id="year">Year</th>
                        <th id="make">Make</th>
                        <th id="model">Model</th>
                        <th id="type">Type</th>
                        <th id="class">Class</th>
                        <th id="price">Price ($USD)</th>
                    </thead>
                    <tbody>
                    <?php foreach ($vehicles as $vechicle) : ?>
                        <tr>
                            <td headers="year"><?=$vechicle['year']?></td>
                            <td headers="make"><?=$vechicle['Make']?></td>
                            <td headers="model"><?=$vechicle['model']?></td>
                            <td headers="type"><?=$vechicle['Type']?></td>
                            <td headers="class"><?=$vechicle['Class']?></td>
                            <td headers="price">$<?=number_format(intval($vechicle['price']))?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </form>
        </section>
    </table>
</form>
<?php } ?>