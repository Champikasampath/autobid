import Search from './search'

const API_PATH = '/api/items';
const SINGLE_ITEM = '/item/';

export default class Item {

    /**
     * load initial data and bind events
     */
    displayBindOnLoad() {
        let self = this;
        $(document).ready(function () {
            self.getItems(API_PATH + '?page=1', '').then(function (data) {
                let temp = self.getProcessedData(data);
                $('.item-gallery').html(temp);
                self.paginate(data);
                self.displayOnClick()
            });
        })
    }

    /**
     * load data on pagination link click
     */
    displayOnClick() {
        let self = this;
        $('.pagination-links').on('click','button',function (e) {
            let elem = $(this);
            let path = elem.attr('data-path')
            self.getItems(path, '').then(function (data) {
                let temp = self.getProcessedData(data);
                $('.item-gallery').html(temp);
                self.paginate(data);
            });
        })
    }

    /**
     * generate pagination link
     * @param data
     */
    paginate(data) {
        let paginateTemp = data.links.map(link => {
            if (link.url) {
                return `<button class="active-${ link.active } pagination-link-a" data-path="${ link.url }">${ link.label }</button>`
            }
        });
        $('.pagination-links').html(paginateTemp.join(""));
    }

    /**
     * generate item gallery
     * @param items
     * @returns {string}
     */
    getProcessedData(items) {
        let temp = '';
        for(const [key, item] of Object.entries(items.data)) {
            temp += `<a href="${SINGLE_ITEM + item.id}"><div class="item-wrapper">
                <img src="${item.thumbnail}" alt="product">
                <span>${ item.title }</span>
                <span>${ item.description }</span>
                <span>${ item.min_price }</span>
            </div></a>`
        }
        return temp;
    }

    /**
     * get items data from backend
     * @param path
     * @param term
     * @returns {*}
     */
    getItems(path, term) {
        return (new Search()).getData(path, term).then(res => res.json()).then(items => items);
    }


}