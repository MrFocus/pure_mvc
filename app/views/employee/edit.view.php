<style type='text/css'>
form{
    margin: 0 auto;
    width: 70%;
    /* border-spacing: 20px; */
    background-color: #f111;
}
form fieldset{
    text-align: left;
}
form input {
    width: 60%;
    height: 35px;
    border-radius: 5px;
    border: none;
    font-size: 17px;
    margin-bottom: 7px
}
form input[type='submit']{
    cursor: pointer
}
</style>

<div class='empform'>
    <form class='appform' method='post' anctype='application/x-www-form-urlencoded'>
        <fieldset>
            <legend>Employee Info</legend>
            <p>Employee Name</p>
            <input type='text'      name='name'     placeholder='Plz enter your name'     value='<?php echo $employee->name ?>' />

            <p>Employee Age</p>
            <input type='text'      name='age'      placeholder='Plz enter your age'      value='<?php echo $employee->age ?>'/>

            <p>Employee Address</p>
            <input type='text'      name='address'   placeholder='Plz enter your address' value='<?php echo $employee->address ?>'/>

            <p>Employee Tax</p>
            <input type='text'      name='tax'       placeholder='Plz enter your tax'     value='<?php echo $employee->tax ?>'/>

            <p>Employee Salary</p>
            <input type='text'      name='salary'    placeholder='Plz enter your salary'  value='<?php echo $employee->salary ?>'/>
            

            <input type='submit'    name='submit' value="Add">
        </fieldset>
    </form>
</div>