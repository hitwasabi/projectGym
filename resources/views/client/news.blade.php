@extends('layouts.base')
@section('title',"Tin tức")

@section('content')
    @include('client.header')
    <section class="category">
        <div class="container">
            <div class="category-top row">
                <p><a href="{{url('/client/home')}}">Trang chủ</a></p> <span>&#10230; </span> <p>Tin tức</p>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @include('client.categoryLeft')
                <div class="category-right row">
                    <h1>Thực phẩm bổ sung là gì ? Lợi ích, cách sử dụng và tác dụng phục của thực phẩm bổ sung</h1>
                    <div class="category-right center">
                        <h3>Chắc hẳn rất nhiều người, đặc biệt là những người mới đi tập gym, tập thể hình đều từng một lần thắc mắc thực phẩm bổ sung là gì , tìm hiểu về thực phẩm bổ sung hỗ trợ tăng cơ giảm mỡ, cải thiện sức khỏe. Đó là lý do vì sao hôm nay WheyShop sẽ cùng các bạn tìm hiểu về khái niệm, nguồn gốc thực phẩm bổ sung, lợi ích, cách sử dụng hiệu quả và tác dụng phụ của thực phẩm bổ sung đối với người tập gym, tập thể hình.</h3>
                        <h2>Thực phẩm bổ sung là gì ?</h2>
                        <h3>Thực phẩm bổ sung theo như định nghĩa khái niệm của đạo luật Dietary Supplement Health and Education của Mỹ năm 1994 (1) trích dẫn : “Định nghĩa thuật ngữ “thực phẩm bổ sung” hay còn gọi là chế phẩm bổ sung là một sản phẩm nhằm bổ sung cho chế độ ăn uống có chứa những thành phần dinh dưỡng có lợi cho sức khỏe bao gồm như : vitamin, khoáng chất, protein, acid amin, … để con người có thể sử dụng an toàn, tổng hợp bổ sung qua đường ăn uống để sử dụng“</h3>
                        <h2>Vậy thực phẩm bổ sung là gì ?</h2>
                        <h3>Thực phẩm bổ sung ngày nay vô cùng phổ biến ở rất nhiều các môn thể thao, y học ,.. chứ không chỉ riêng đối với thể hình. Thực phẩm bổ sung là những sản phẩm nhằm cung cấp các dưỡng chất có lợi cho sức khỏe vào chế độ ăn uống như : protein, vitamin khoáng chất, calories, … nhằm hỗ trợ cải thiện sức khỏe, tăng cường cơ bắp, tăng cân và rất nhiều lợi ích khác.
                            Thực phẩm bổ sung không phải là thuốc và không có chức năng thay thế thuốc chữa bệnh. Thực phẩm bổ sung cũng được khuyến cáo là không nên dùng để thay thế bữa ăn chính hoặc thay hoàn toàn cho nguồn dinh dưỡng từ thực phẩm tự nhiên. </h3>
                        <a><img src="{{asset('images/nhung-dieu-nen-biet-ve-whey-concentrate-80-whey-concentrate-la-gi.jpg')}}"></a>
                        <h2>
                            Nguồn gốc thực phẩm bổ sung :
                        </h2>
                        <h3>100% nguồn nguyên liệu của các thực phẩm bổ sung đều được sản xuất hoàn toàn từ tự nhiên. Ví dụ như thực phẩm bổ sung protein hỗ trợ phát triển cơ bắp như Whey Protein thì sẽ chiết xuất hoàn toàn từ 100% sữa bò nguyên chất, thực phẩm bổ sung Vitamin thì sẽ chiết xuất từ các loại rau, củ…
                            <br>
                            Nói cách khác thì nguồn gốc thực phẩm bổ sung cũng chính là từ thực phẩm tự nhiên, việc chúng ta sử dụng thực phẩm bổ sung cũng như việc ăn uống bổ sung qua thực phẩm tự nhiên, nhưng đối với thực phẩm bổ sung sẽ tiện lợi hơn, chiết xuất tốt hơn và hiệu quả cao hơn cho người sử dụng. </h3>
                        <h2>
                            Thực phẩm bổ sung có phải là thực phẩm chức năng ?
                        </h2>
                        <h3>Thực phẩm bổ sung không phải là thực phẩm chức năng. Thực phẩm bổ sung có công dụng bổ sung dinh dưỡng trong khi thực phẩm chức năng cũng bổ sung dinh dưỡng việc sử dụng thực phẩm chức năng nhằm giải quyết phục vụ một vấn đề, mục đích đặc thù của từng cá nhân nào đó ví dụ như hiến muộn, sinh lý, …
                            <br>
                            Còn về thực phẩm bổ sung thì có thể hoàn toàn sử dụng, duy trì thời gian dài, nhằm mục đích cải thiện sức khỏe, phát triển cơ bắp, miễn dịch ,… Thực phẩm bổ sung nghĩa là sử dụng không bắt buộc, bạn có điều kiện sử dụng thực phẩm bổ sung thì sẽ rất tốt, mang tới nhiều lợi ích cho sức khỏe. Nếu không sử dụng thực phẩm bổ sung thì hoàn toàn có thể bổ sung nguồn dinh dưỡng qua chế độ ăn uống khoa học, đầy đủ chứ không hoàn toàn mang tính chất bắt buộc như thực phẩm chức năng để phục vụ một vấn đề, đặc thù của từng cá nhân.</h3>
                        <h2>
                            Vai trò, cách sử dụng thực phẩm bổ sung đối với người tập gym, thể hình :
                        </h2>
                        <h3>
                            Để tìm hiểu chi tiết về vai trò, cách sử dụng thực phẩm bổ sung đối với người tập gym, thể hình thì WheyShop sẽ cùng các bạn phân tích tìm hiểu chi tiết hơn để các bạn có thể hiểu sâu hơn về thực phẩm bổ sung, cân nhắc lựa chọn được sản phẩm phù hợp với bản thân.
                        </h3>
                        <h2>
                            Khi nào nên sử dụng thực phẩm bổ sung :
                        </h2>
                        <h3>
                            Để xác định được khi nào nên sử dụng thực phẩm bổ sung thì chúng ta cần đánh giá tới 2 yếu tố mà PT'store coi là quan trọng nhất :
                            <ol>
                                <li>- Nhu cầu sử dụng</li>
                                <li>- Điều kiện kinh tế</li>
                            </ol>

                            Về nhu cầu sử dụng : bạn cần phải hiểu rõ được chế độ dinh dưỡng hay cơ thể mình đang thiếu gì bằng cách lắng nghe chính cơ thể mình.
                            <ol>
                                <li>- Một bữa ăn thiếu đi thịt, cá sẽ không cung cấp đầy đủ hàm lượng protein giúp cho bạn phục hồi và phát triển cơ bắp hiệu quả sau mỗi buổi tập mà còn khiến bạn dị hóa, khó duy trì cơ bắp.</li>
                                <li>- Bạn muốn tăng cân nhanh nhưng lại không ăn uống đẩy đủ chất hoặc đơn giản là bạn quá bận rộn để chuẩn bị nhiều hơn 3 bữa ăn trong ngày.</li>
                                <li>- Hay như cơ thể bạn luôn đau ốm, bệnh vặt thì chắc chắn đó là dấu hiệu của chế độ ăn uống thiếu đi những Vitamin, khoáng chất cần thiết để duy trì sức khỏe, tăng cường sức đề kháng.</li>
                            </ol>
                            Từ đó bạn sẽ cân nhắc được việc có nên sử dụng thực phẩm bổ sung hay không. Liệu thực phẩm bổ sung có cần thiết cho cơ thể hay không để có thể lựa chọn được những thực phẩm bổ sung quan trọng cho sức khỏe, nhu cầu bản thân.
                        </h3>
                        <a><img src="{{asset('images/20-meo-giam-mo-bung-don-gian-va-hieu-qua.jpg')}}"></a>
                        <h3>Về điều kiện kinh tế : thực tế thì giá thực phẩm bổ sung tính ra theo mỗi lần dùng và hàm lượng dinh dưỡng so với thực ăn tự nhiên thì khá rẻ. Có thể nói thực phẩm bổ sung cung cấp nhiều hàm lượng dinh dưỡng thiết yếu hơn, tiện lợi sử dụng hơn mà giá không chênh quá nhiều. Nhưng việc sử dụng thực phẩm bổ sung sẽ khiến bạn phải chi một số tiền nhất định cho 30-60 ngày sử dụng nên sẽ là vấn đề với nhiều bạn, đặc biệt là các bạn học sinh, sinh viên khi muốn sử dụng thực phẩm bổ sung.</h3>
                        <h3>Lời khuyên của PT'Store là nếu như bạn có thể đáp ứng đầy đủ nguồn thực phẩm tự nhiên, đảm bảo dinh dưỡng và có kinh tế dư dả thì hoàn toàn bạn có thể sử dụng thêm thực phẩm bổ sung để giúp cải thiện sức khỏe, phát triển cơ bắp, …
                            <br>
                            Nhưng nếu bạn có điều kiện kinh tế eo hẹp hơn, chưa đáp ứng được đầy đủ nguồn thực phẩm tự nhiên trong bữa ăn chính thì không nên đầu tư một số tiền vào thực phẩm bổ sung, cũng như dành hết tiền tiết kiệm mua thực phẩm bổ sung với mong muốn hiệu quả vượt trội. Bởi thực chất thực phẩm bổ sung chỉ hiệu quả khi bạn đã đảm bảo dinh dưỡng từ các bữa ăn chính và sử dụng thêm thực phẩm bổ sung hỗ trợ.
                            <br>
                            Đây cũng là sai lầm mà rất nhiều bạn hiện nay, đặc biệt là sinh viên thường mắc phải, bởi bản chất nguồn dinh dưỡng tốt nhất chính là nguồn dinh dưỡng bạn nạp từ thức ăn tự nhiên, thực phẩm bổ sung rất tốt nhưng không thể thay thế hoàn toàn cho thực ăn tự nhiên được.
                            <br>
                            Tất nhiên vẫn có rất nhiều thực phẩm bổ sung giá rẻ chỉ có vài trăm ngàn, kể đến như : Dầu cá Omega-3 , Vitamin , … đều mang lại hiệu quả rất tốt cho sức khỏe, quan trọng là chúng ta cần xác định nhu cầu sử dụng từ chính cơ thể mình trước khi đưa ra quyết định sử dụng thực phẩm bổ sung . Thực phẩm bổ sung chỉ hỗ trợ cho chế độ dinh dưỡng tự nhiên, điều quan trọng là chúng ta cần tập trung nhiều hơn và các bữa ăn chính hằng ngày, đảm bảo dinh dưỡng tự nhiên. </h3>
                        <a><img src="{{asset('images/dau-nanh-tot-hay-sau-voi-suc-khoe-ung-thu-vu.jpg')}}"></a>
                        <h2>Thực phẩm bổ sung hỗ trợ phát triển cơ bắp :</h2>
                        <h3>Thực phẩm bổ sung hỗ trợ phát triển cơ bắp chắc chắn luôn là lựa chọn tìm kiếm và sử dụng hàng đầu của người tập gym, thể hình với mục đích phát triển cơ bắp. Tiêu biểu những thực phẩm bổ sung này có thể kể tới như : Whey Protein và BCAA & EAAs .
                            <br>
                            Whey Protein có chiết xuất hoàn toàn từ sữa bò, cung cấp hàm lượng protein tinh khiết, bổ sung nguồn protein vào chế độ dinh dưỡng của chúng ta. Việc tập luyện sẽ kích thích phá hủy các mô cơ thì việc bổ sung protein đầy đủ sẽ giúp phục hồi, xây dựng lại các mô cơ mới to lớn hơn, khỏe hơn , đó chính là quá trình phát triển của cơ bắp.
                            <br>
                            Whey Protein ngày nay rất đa dạng, có tới 4 loại Whey protein khác nhau bao gồm : Whey protein concentrate, Whey protein isolate, Whey protein hydrolyzed và Whey protein blend. Tùy thuộc vào nhu cầu sử dụng và điều kiện kinh tế để lựa chọn sản phẩm phù hợp. </h3>
                        <a><img src="{{asset('images/nen-dung-thuc-pham-bo-sung-hay-khong.jpg')}}"></a>
                        <h3>BCAA & EAAs : là thành phẩm từ quá trình phân tách Whey Protein, đây đều là thực phẩm bổ sung cung cấp những amino acid thiết yếu cho cơ bắp mà cơ thể không tự tổng hợp được, cần bổ sung qua chế độ dinh dưỡng ăn uống.
                            <br>
                            Bổ sung đầy đủ BCAA & EAAs sẽ giúp phục hồi cơ bắp hiệu quả hơn, tăng khả năng tổng hợp hấp thu protein, xây dựng cơ bắp tốt hơn. Ngoài Whey Protein thì BCAA & EAAs cũng là thực phẩm bổ sung thiết yếu cho quá trình xây dựng cơ bắp hiệu quả, đặc biệt với chế độ ăn uống thiếu hụt protein. </h3>
                        <h2>Thực phẩm bổ sung hỗ trợ tăng cân :</h2>
                        <h3>Tăng cân ngày nay cũng xu thế, nhu cầu lớn của mọi người. Ai mà lại không mong muốn có vóc dáng cân đối, tự tin hơn trong công việc, giao tiếp xã hội, gia đình cùng vô vàn lợi ích cho sức khỏe đến từ việc tăng cân.
                            <br>
                            Người gầy thiếu cân tìm tới thực phẩm bổ sung hỗ trợ tăng cân như là một giải pháp cứu cánh hoàn hảo, khi mà thực phẩm bổ sung Sữa tăng cân ( hay còn gọi là Mass Gainer ) có hiệu quả tăng cân tốt, hoàn toàn an toàn cho người sử dụng và giá thành phải chăng, dễ dàng sở hữu và sử dụng.
                            <br>
                            Thực phẩm bổ sung tăng cân ( hay còn gọi là Mass Gainer ) : là một sự kết hợp của rất nhiều các nguồn dinh dưỡng khác nhau như tinh bột, protein, chất béo tốt, vitamin, khoáng chất,.. đôi khi là cả các enzyme hỗ trợ tiêu hóa, preotic lợi khuẩn ,… Sự ra đời của Mass Gainer chính là giải pháp thay thế cho những bữa ăn phụ đảm bảo dinh dưỡng, cung cấp một lượng lớn calories cho người sử dụng, hỗ trợ tăng cân hoàn toàn tự nhiên, an toàn khi sử dụng.
                            <br>
                            Mass Gainer chia ra làm 2 loại dựa làm hàm lượng calories và thành phần protein mà có Mass Gainer cao năng lượng hỗ trợ tăng cân nhanh, Mass Gainer trung năng lượng giúp tăng cân phát triển cơ bắp tối ưu. Mass Gainer cũng được coi như giải pháp tiện lợi thay thế cho người tập luyện nhưng luôn bận rộn không có nhiều thời gian chuẩn bị bữa ăn phụ. </h3>
                        <h2>Thực phẩm bổ sung cải thiện sức khỏe toàn diện : </h2>
                        <h3>Rất nhiều người tập luyện gym, thể hình với mục đích cải thiện sức khỏe toàn diện và tìm tới thực phẩm bổ sung hỗ trợ như Vitamin, khoáng chất… giúp cải thiện sức khỏe tổng thể, tăng cường trao đổi chất và hệ miễn dịch.
                            <br>
                            Thực phẩm bổ sung cải thiện sức khỏe toàn diện như vitamin, khoáng chất bao gồm rất nhiều loại. Có thể là những sản phẩm tổng hợp đa dạng như multivitamin hoặc nhưng sản phẩm đơn chất phục vụ một sự thiếu hụt nhất đinh như : Vitamin D3, Vitamin K2 – Mk7 , Astaxanthin, …
                            <br>
                            Tùy thuộc vào nhu cầu của cơ thể mà chúng ta lựa chọn những sản phẩm phù hợp với mình nhất. Lời khuyên của WheyShop, dù bạn có ăn uống đầy đủ hoa quả, thực phẩm tự nhiên thì rất khó để đáp ứng đủ cũng như kiểm soát hàm lượng vitamin và khoáng chất nạp vào cơ thể.
                            <br>
                            Lựa chọn thực phẩm bổ sung tổng hợp là cách hiệu quả nhất và dễ dàng nhất để cải thiện, duy trì sức khỏe hiệu quả với giá thành rất rẻ. </h3>
                        <h2>Thực phẩm bổ sung hỗ trợ giảm cân đốt mỡ : </h2>
                        <h3>Cùng với nhu cầu tăng cân cải thiện vóc dáng, thì nhu cầu giảm cân cũng là vô cùng cấp thiết với mọi người. Mất kiểm soát cân nặng đồng nghĩa với những tác hại xấu đi kèm kể tới như các vấn đề về cholesterol, tim mạch, xơ vữa động mạch, sức khỏe, sức đề kháng yếu, …
                            <br>
                            Thực phẩm bổ sung hỗ trợ giảm cân đốt mỡ là những sản phẩm có nguồn gốc chiết xuất từ thảo mộc tự nhiên, tiêu biểu như tinh chất tiêu đen, cafe, trà xanh, … đó đều là những chất tốt, thúc đẩy quá trình trao đổi chất, giảm thèm ăn, kiểm soát đường huyết giúp giảm cân hoàn toàn tự nhiên.
                            <br>
                            Thực phẩm bổ sung hỗ trợ giảm cân đốt mỡ chia ra làm 2 loại : thực phẩm bổ sung kích thích tăng cường trao đổi chất, cải thiện hiệu suất tập hiệu quả hơn và thực phẩm bổ sung chuyển hóa mỡ thừa, thường là chất béo tốt CLA hay Amino L-Carnitine giúp tăng cường chuyển hóa mỡ thành năng lượng.</h3>
                        <h2>Thực phẩm bổ sung tăng cường sức mạnh : </h2>
                        <h3>Chắc hẳn người tập gym, thể hình đã có không dưới một lần uể oải, mệt mỏi trước mỗi buổi tập bởi công việc, gia đình hay nhiều vấn đề khác. Thực phẩm bổ sung tăng cường sức mạnh là sản phẩm cung cấp một hoặc nhiều thành phần khác nhau giúp cung cấp năng lượng, thúc đẩy hiệu suất tập luyện, cải thiện tinh thần tỉnh táo tập trung.
                            <br>
                            Thực phẩm bổ sung tăng cường sức mạnh ( hay còn gọi là Pre Workout ) trở nên ngày càng phổ biến hiện nay. Chỉ với một serving, giúp bạn tập luyện hiệu quả hơn rất nhiều, cải thiện sức bền, sức mạnh hiệu quả cho người sử dụng.
                            <br>
                            Đối với những sản phẩm như Pre Workout, WheyShop khuyên bạn nên sử dụng vừa đủ, tránh lạm dụng bởi thành phần thực phẩm bổ sung này chứa caffeine hoặc các chất tương tự có thể gây một số tác dụng phụ như mất ngủ, say cafe, … tác động không tốt tới kết quả buổi tập, giấc ngủ của bạn, …</h3>
                    </div>



                </div>
            </div>
        </div>
    </section>
@endsection



