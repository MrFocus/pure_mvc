<style type="text/css">
table{
    margin: 0 auto;
    width: 70%;
    border-spacing: 20px;
    background-color: #f1f1c1;
}
table tr {
    text-align: left;
}
table tr:nth-child(odd){
    background-color:#e1e1e1;
}
</style>
<div class='view'>
    <a href='/mvc/employee/add'>Add new Employee</a>
    <table>
        
        <br>
        <tr>
            <th>Name</th>
            <th>Address</th> 
            <th>Age</th>
            <th>tax</th>
            <th>salary</th>
            <th>option</th>
        </tr>
        <?php
            if(!empty($employees)){
                if(isset($_SESSION['employee'])){
                    echo $_SESSION['employee'];
                    unset($_SESSION['employee']);
                }
                foreach ($employees as $employee) { echo "<tr>";
                    echo "<td>" . $employee->name . "</td>";
                    echo "<td>" . $employee->address . "</td>";
                    echo "<td>" . $employee->age . "</td>";
                    echo "<td>" . $employee->tax."</td>";
                    echo "<td>" . $employee->salary."</td>";
                    echo "<td> 
                                <a href='/mvc/employee/edit/"   . $employee->id . "'>Edit</a>
                                <a class='delete-confirm' href='/mvc/employee/delete/" . $employee->id . "'>Delete</a>";
                    echo "</td>";                                                           
                echo "</tr>";     
                }
            }
        ?>
    </table>
</div>