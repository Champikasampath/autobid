import Search from './search'

export default class Item {

    displayOnLoad() {
        let self = this;
        $(document).ready(function () {
            self.getItems(1, '').then(function (data) {
                let temp = self.getProcessedData(data);
                $('.item-gallery').html(temp);
                self.paginate(data);
            });
        })
    }

    paginate(data) {
        let paginateTemp = data.links.map(link => {
           return `<a class="active-${ link.active }" href="${ link.url }">${ link.label }</a>`
        });
        $('.pagination-links').html(paginateTemp.join());
    }

    getProcessedData(items) {
        let temp = '';
        for(const [key, item] of Object.entries(items.data)) {
            temp += `<div class="item-wrapper">
                <img src="${item.thumbnail}" alt="product">
                <span>${ item.title }</span>
                <span>${ item.description }</span>
                <span>${ item.min_price }</span>
            </div>`
        }
        return temp;
    }

    getItems(page, term) {
        let path = '/api/items/';
        return (new Search()).getData(path, page, term).then(res => res.json()).then(items => items);
    }


}