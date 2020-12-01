const API_PATH = '/api/bid/';

export default class Item {

    /**
     * initiate
     */
    init() {
        this.bidOnSubmit()
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
            return self.ajaxRequest(data);
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
}