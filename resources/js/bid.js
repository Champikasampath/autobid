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
        const timer = new Timer();

        timer.on('tick', (ms) => {
            $('.countdown-timer').empty();
            $('.countdown-timer').html(ms);
        })
        timer.on('done', () => {
            $('#bidding').hide();
            $('.countdown-timer').html("<span style='color: red'>Times Up!</span>");
        });
        timer.on('statusChanged', (status) => {

        })

        timer.start(5000) // run for 5 seconds
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


            self.ajaxRequest(data)
                .then(res => {
                    return res.json();
                })
                .then(data => {
                    if(!data.error) {
                        this.reset();
                        self.showMessage('Success', 'alert-success');
                        window.location.reload();
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
    ajaxRequest(data) {
        return fetch(API_PATH , {
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