jQuery(document).ready(function() {
    jQuery("#calculate-zakat-on-crops-form").on("submit",function(e){

        e.preventDefault();
        $irrigation  = parseFloat(jQuery("#method").val());
        $quantity    = parseFloat(jQuery("#quantity").val());
        
        $zakat = "ليس عليك زكاة";
        if($quantity >= 653) {
            $zakat = $irrigation * $quantity / 100;
        }
        swal({
            title: "نتيجة حساب زكاة المحاصيل",
            text: "قيمة الزكاة المستحقة ( "+$zakat+" )",
            button: "Ok",
          });

    });

    jQuery("#how-to-calc").on("click",function() {
        swal({
            title: "كيفية حساب زكاة الزروع",
            text: "الكمية المنتجة بالكيلوجرام يجب أن تمر بالنصاب وهي 653 كجم\nفي حالة الري المطري الزكاة 10٪.\nفي حالة الري المروي أو الصناعي الزكاة مستحقة 5٪",
            icon: "info",
            button: "موافق",
            className: 'swal-wide',
          });
    })
});