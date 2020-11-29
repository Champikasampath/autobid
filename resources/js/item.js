import Search from './search'

export default class Item {

    display() {
        let self = this;
        $(document).ready(function () {
            self.getItems(10, 0, '').then(function (data) {
                let temp = self.getProcessedData(data);
                $('.item-gallery').html(temp);
            });

        })

    }

    getProcessedData(items) {

        let temp = '';

        for(const [key, item] of Object.entries(items)) {
            temp += `<div class="item-wrapper">
                <img src="${item.thumbnail}" alt="product">
                <span>${ item.description }</span>
                <span>${ item.bid }</span>
            </div>`
        }

        return temp;
    }

    getItems(Offset, start, term) {
        let path = '/api/items';
        return (new Search(Offset)).getData(path, start, term).then(res => res.json()).then(items => items);
    }


}