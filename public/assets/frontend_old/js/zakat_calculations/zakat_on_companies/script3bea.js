jQuery(document).ready(function() {
    jQuery("#calculate-zakat-on-companies-form").on("submit",function(e){

        e.preventDefault();
        $year_pass = jQuery("#year_pass").val();
        $year_type = parseFloat(jQuery("#year_type").val());

        // Money in Circulation
        $circulations = [
            parseFloat(jQuery("#circulation1").val()),
            parseFloat(jQuery("#circulation2").val()),
            parseFloat(jQuery("#circulation3").val())
        ];

        // Debts
        $debts = [
            parseFloat(jQuery("#debt1").val()),
            parseFloat(jQuery("#debt2").val())
        ];
        
        $zakat = "You do not have Zakat";
        if($year_pass == 'yes') {
            $circulations = $circulations.reduce( (a,b) => a+b);
            $debts = $debts.reduce( (a,b) => a+b );
            $zakat =  ($circulations - $debts)*$year_type/100;
        }
        swal({
            title: "Zakat on Compnaies Calculation Result",
            text: "The value of Zakat due is ( "+$zakat+" )",
            button: "Ok",
          });

    });

    jQuery("#how-to-calc").on("click",function() {
        swal({
            title: "How to Calculate Zakat on Companies",
            text: "The Hijri Year: (Amount * 2.5%) or (Amount * 2.5 / 100) = Due Zakat\n\
            Gregorian Year: (Amount * 79 2.5%) or (Amount * 2.579 / 100) = Due Zakat\n\
            The amount of zakat on trade goods is one-fourth of one-tenth (2.5%).\n\
            Merchandise value (today's price) and not book value (purchase value or cost).\n\
            Desired debts do not take into account un-wanted or doubtful debts, such as debts that are insolvent or delayed or debts that have no evidence.\n\
            Credit items i.e.: the owed you owe to others during the next year. If he owes a five-year debt, he deducts only one year's installments.",
            icon: "info",
            button: "Ok",
            className: 'swal-wide',
          });
    })
});