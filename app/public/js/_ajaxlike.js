//  いいね機能
$(function () {
    let like = $('.js-like-toggle');
    let likePostId;

    like.on('click', function () {
        let $this = $(this);
        likePostId = $this.data('postid');
        $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/ajaxlike',  //routeの記述
                type: 'POST', //受け取り方法の記述（GETもある）
                data: {
                    'post_id': likePostId //コントローラーに渡すパラメーター
                },
        })

            // Ajaxリクエストが成功した場合
            .done(function (data) {

            //lovedクラスを追加
                $this.toggleClass('loved');

             //.likesCountの次の要素のhtmlを「data.postLikesCount」の値に書き換える
                $this.next('.likesCount').html(data.postLikesCount);

            })
            // Ajaxリクエストが失敗した場合
            .fail(function (xhr, err) {
            //ここの処理はエラーが出た時にエラー内容をわかるようにしておく。
            //とりあえず下記のように記述しておけばエラー内容が詳しくわかります。笑

                console.log(err);
                console.log(xhr);
            });

        return false;
    });
});

// FOLLOW 機能
$(function () {
    let follow = $('.js-follow-toggle');
    let followUserId;

    follow.on('click', function () {
        let $this = $(this);
        alert('押せた');
        followUserId = $this.data('follow');
        $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/ajaxfollow',  //routeの記述
                type: 'POST', //受け取り方法の記述（GETもある）
                data: {
                    'follow_id': followUserId //コントローラーに渡すパラメーター
                },
        })

            // Ajaxリクエストが成功した場合
            .done(function (data) {
                console.log(data);
            //lovedクラスを追加
                $this.toggleClass('followed');

             //.likesCountの次の要素のhtmlを「data.postLikesCount」の値に書き換える
            })
            // Ajaxリクエストが失敗した場合
            .fail(function (data, xhr, err) {
            //ここの処理はエラーが出た時にエラー内容をわかるようにしておく。
            //とりあえず下記のように記述しておけばエラー内容が詳しくわかります。笑

                console.log(err);
                console.log(xhr);
                console.log(data);
            });

        return false;
    });
});
