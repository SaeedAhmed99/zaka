jQuery(document).ready(function() {
    jQuery("#calculate-zakat-on-estates-form").on("submit",function(e){

        e.preventDefault();
        $year_pass = jQuery("#year_pass").val();
        $year_type = parseFloat(jQuery("#year_type").val());

        // Money in Circulation
        $revenues = [
            parseFloat(jQuery("#revenue1").val()),
            parseFloat(jQuery("#revenue2").val())
        ];

        // Expense
        $expense = parseFloat(jQuery("#expense").val());
        
        $zakat = "You do not have Zakat";
        if($year_pass == 'yes') {
            $revenues = $revenues.reduce( (a,b) => a+b);
            $zakat =  ($revenues - $expense)*$year_type/100;
        }
        swal({
            title: "Zakat on Compnaies Calculation Result",
            text: "The value of Zakat due is ( "+$zakat+" )",
            button: "Ok",
          });

    });

    jQuery("#how-to-calc").on("click",function() {
        swal({
            title: "How to Calculate Zakat on Real Estates",
            text: "(Value of revenues during the year - expenses) x 2.5%\n\
            The Hijri Year: (Amount * 2.5%) or (Amount * 2.5 / 100) = Due Zakat\n\
            Gregorian Year: (Amount * 79 2.5%) or (Amount * 2.579 / 100) = Due Zakat",
            icon: "info",
            button: "Ok",
            className: 'swal-wide',
          });
    })
});