jQuery(document).ready(function() {
    jQuery("#calculate-zakat-on-cash-form").on("submit",function(e){

        e.preventDefault();
        $nissab      = parseFloat(jQuery("#nissab").val());
        $year        = jQuery("#year").val();
        $year_value  = parseFloat(jQuery("#year_value").val());
        $amount      = parseFloat(jQuery("#amount").val());
        
        $zakat = "لا يوجد عليك زكاة";
        if($year == "yes") {
            if($amount >= $nissab) {
                $zakat = $amount * $year_value / 100;
            }
        }
        swal({
            title: "نتيجة حساب الزكاة",
            text: "قيمة الزكاة المستحقة بالعملة المحلية ( "+$zakat+" )",
            button: "موافق",
          });

    });

    jQuery("#how-to-calc").on("click",function() {
        swal({
            title: "كيف تحسب زكاة النقود",
            text: "السنة الهجرية: (المبلغ * 2.5٪) أو (المبلغ * 2.5 / 100) = الزكاة المستحقة\n\السنة الميلادية: (المبلغ * 79 2.5٪) أو (المبلغ * 2.579 / 100) = الزكاة المستحقة",
            icon: "info",
            button: "موافق",
            className: 'swal-wide',
          });
    })
});