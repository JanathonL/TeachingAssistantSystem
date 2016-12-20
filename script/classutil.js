/**
 * Created by linjunru on 2016/12/14.
 */

/**
 *
 * @param Element
 * @param className
 */
function addClass(Element, className) {
    var classList = Element.classList;
    classList.add(className);
}

/**
 *
 * @param Element
 * @param className
 */
function removeClass(Element, className) {
    var classList = Element.classList;
    classList.remove(className);
}

/**
 *
 * @param Element
 * @param className
 */
function toggleClass(Element, className) {
    var classList = Element.classList;
    classList.toggle(className);
}