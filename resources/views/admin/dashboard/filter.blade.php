<div class="row" >
    <form autocomplete="off">
        @CSRF
        <div class="col-md-3">
            <p> from: <input type='text' id = "datepicker" class= "from-controll" name="from_date"> </p>
        </div>

        <div class="col-md-3">
            <p> to: <input type='text' id = "datepicker2" class= "from-controll" name= "to_date"> </p>
        </div>

        <div class="col-md-1">
        <input type="button" id="btn-dashboard-filter" class=" btn btn-primary btn-sm" value="filter">
        </div>
    </form>
</div>