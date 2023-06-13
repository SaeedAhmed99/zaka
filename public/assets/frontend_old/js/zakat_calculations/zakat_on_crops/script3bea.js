jQuery(document).ready(function() {
    jQuery("#calculate-zakat-on-crops-form").on("submit",function(e){

        e.preventDefault();
        $irrigation  = parseFloat(jQuery("#method").val());
        $quantity    = parseFloat(jQuery("#quantity").val());
        
        $zakat = "You do not have Zakat";
        if($quantity >= 653) {
            $zakat = $irrigation * $quantity / 100;
        }
        swal({
            title: "Zakat on Crops Calculation Result",
            text: "The value of Zakat due is ( "+$zakat+" )",
            button: "Ok",
          });

    });

    jQuery("#how-to-calc").on("click",function() {
        swal({
            title: "How to Calculate Zakat on Crops",
            text: "Quantity produced in kilograms must pass nissab which is 653 KG\nIn the case of rain irrigation, Zakat is 10%\nIn the case of irrigated or industrial irrigation, Zakat payable 5%",
            icon: "info",
            button: "Ok",
            className: 'swal-wide',
          });
    })
});