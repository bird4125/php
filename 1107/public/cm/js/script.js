/* script 기본으로 제공되는 소스는 지우지 마시오. */
var app = {
	// 총 금액 계산
	sumTotal : function(cnt) {
		var cost = $(".prices").text();
		cost = cost.split(",");
		cost = cost[0]+cost[1];

		var totalCost = cnt * parseInt(cost);
		
		totalCost = totalCost.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");		
		$("#totalPrice").text(totalCost+"원("+cnt+")개");
	},

	init : function() {
		// 카운트 up
		$(".up").on("click", function() {
			var cnt = $("#quantity").val();
			cnt++;
			$("#quantity").val(cnt);
			app.sumTotal(cnt);
		});
		
		// 카운트 down
		$(".down").on("click", function() {
			var cnt = $("#quantity").val();
			cnt--;
			if(cnt < 1) {
				alert("상품의 수량은 1개 이상이어야 합니다!");
				cnt = 1;
			}
			$("#quantity").val(cnt);	
			app.sumTotal(cnt);
		});
		
	}
}

 $(document).ready(function() {
	 app.init();
 });