jQuery(document).ready(function() {
    jQuery("#calculate-zakat-on-cash-form").on("submit",function(e){

        e.preventDefault();
        $nissab      = parseFloat(jQuery("#nissab").val());
        $year        = jQuery("#year").val();
        $year_value  = parseFloat(jQuery("#year_value").val());
        $amount      = parseFloat(jQuery("#amount").val());
        
        $zakat = "You do not have Zakat";
        if($year == "yes") {
            if($amount >= $nissab) {
                $zakat = $amount * $year_value / 100;
            }
        }
        swal({
            title: "Zakat on Cash Calculation Result",
            text: "The value of Zakat due in local currency is ( "+$zakat+" )",
            button: "Ok",
          });

    });

    jQuery("#how-to-calc").on("click",function() {
        swal({
            title: "How to Calculate Zakat on Cash",
            text: "The Hijri Year: (Amount * 2.5%) or (Amount * 2.5 / 100) = Due Zakat\nThe Gregorian Year: (Amount * 79 2.5%) or (Amount * 2.579 / 100) = Due Zakat",
            icon: "info",
            button: "Ok",
            className: 'swal-wide',
          });
    })
});