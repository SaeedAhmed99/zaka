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
        
        $zakat = "ليس عليك زكاة";
        if($year_pass == 'yes') {
            $circulations = $circulations.reduce( (a,b) => a+b);
            $debts = $debts.reduce( (a,b) => a+b );
            $zakat =  ($circulations - $debts)*$year_type/100;
        }
        swal({
            title: "نتيجة حساب زكاة الشركات",
            text: "قيمة الزكاة المستحقة ( "+$zakat+" )",
            button: "موافق",
          });

    });

    jQuery("#how-to-calc").on("click",function() {
        swal({
            title: "كيفية احتساب زكاة الشركات",
            text: "السنة الهجرية: (المبلغ * 2.5٪) أو (المبلغ * 2.5 / 100) = الزكاة المستحقة\n\
            السنة الميلادية: (المبلغ * 79 2.5٪) أو (المبلغ * 2.579 / 100) = الزكاة المستحقة\n\
            مقدار الزكاة على التجارة هو ربع العشر (2.5٪).\n\
            قيمة البضائع (سعر اليوم) وليس القيمة الدفترية (قيمة الشراء أو التكلفة).\n\
            الديون المرغوبة لا تأخذ في الاعتبار الديون غير المرغوب فيها أو المشكوك في تحصيلها ، مثل الديون المعسرة أو المتأخرة أو الديون التي ليس لها دليل.\n\
            بنود الائتمان ، أي: المستحق الذي تدين به للآخرين خلال العام المقبل. إذا كان مدينًا بدين لمدة خمس سنوات ، فإنه يقتطع أقساط سنة واحدة فقط.",
            icon: "info",
            button: "موافق",
            className: 'swal-wide',
          });
    })
});