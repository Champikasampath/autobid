import Timer from "tiny-timer/dist/tiny-timer";

const API_PATH = '/api/bid/';

export default class Item {

    /**
     * initiate
     */
    init() {
        this.bidOnSubmit();
        this.countDown();
    }

    countDown() {
        let bidend = $("#bid_end").attr('data-bidend');

        let countDownDate = new Date(bidend).getTime();//TODO:remove hardcoded

        // Update the count down every 1 second
        setInterval(function() {

            let now = new Date().getTime();

            let distance = countDownDate - now;

            let days = Math.floor(distance / (1000 * 60 * 60 * 24));
            let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            let seconds = Math.floor((distance % (1000 * 60)) / 1000);

            let counter = days + "d " + hours + "h " + minutes + "m " + seconds + "s ";

            let elem = $('.countdown-timer');
            elem.empty();
            elem.html(counter);

            if (distance < 0) {
                clearInterval(x);
                elem.html("<span style='color: red'>Times Up!</span>");
            }
        }, 1000);
    }

    /**
     * bind on submit event for bidding
     */
    bidOnSubmit() {
        let self = this;
        $('#bidding').submit(function (e) {
            e.preventDefault();
            let bid = $('.bid').val();
            let item_id = $('.item_id').val();
            let data = {
                'bid' : bid,
                'item_id' : item_id
            }


            self.ajaxRequest(API_PATH, data)
                .then(res => {
                    return res.json();
                })
                .then(data => {
                    if(!data.error) {
                        this.reset();
                        self.showMessage('Success', 'alert-success');
                        setTimeout(function () {
                            window.location.reload();
                        }, 2000)
                    }
                    else {
                        self.showMessage(data.error, 'alert-danger')
                    }
                });
        })
    }

    /**
     * trigger ajax
     * @param data
     * @returns {Promise<Response>}
     */
    ajaxRequest(path, data) {
        return fetch(path , {
            method: 'POST', // or 'PUT'
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data),
        })
    }

    showMessage(msg, cls) {
        $(".flash-alert").addClass(cls);
        $(".flash-alert").show();
        $(".flash-alert .flash-message").html(msg);

        setTimeout(function() {
            $(".flash-alert").hide()
            $(".flash-alert").removeClass(cls);
        }, 3500);
    }
}