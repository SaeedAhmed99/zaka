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
        
        $zakat = "ليس عليك زكاة";
        if($year_pass == 'yes') {
            $revenues = $revenues.reduce( (a,b) => a+b);
            $zakat =  ($revenues - $expense)*$year_type/100;
        }
        swal({
            title: "نتيجة حساب الزكاة",
            text: "قيمة الزكاة المستحقة ( "+$zakat+" )",
            button: "موافق",
          });

    });

    jQuery("#how-to-calc").on("click",function() {
        swal({
            title: "كيفية احتساب زكاة العقارات",
            text: "(قيمة الإيرادات خلال العام - المصروفات) × 2.5٪\n\
            السنة الهجرية: (المبلغ * 2.5٪) أو (المبلغ * 2.5 / 100) = الزكاة المستحقة\n\
            السنة الميلادية: (المبلغ * 79 2.5٪) أو (المبلغ * 2.579 / 100) = الزكاة المستحقة",
            icon: "info",
            button: "موافق",
            className: 'swal-wide',
            
               
          });
    })
});