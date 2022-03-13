jQuery(document).ready(function ($) {
  // external js: isotope.pkgd.js

  // init Isotope
  var $grid = $('.projekt-wrapper.row').isotope({
    itemSelector: '.type', filter: '.privat'
  })

  // store filter for each group
  var filters = {}

  $('.filters').on('click', '.filter', function (event) {
    var $filter = $(event.currentTarget)
    // get group key
    var $filterGroup = $filter.parents('.filter-group')
    var filterGroup = $filterGroup.attr('data-filter-group')
    // set filter for group
    filters[filterGroup] = $filter.attr('data-filter')
    // combine filters
    var filterValue = concatValues(filters)
    // set filter for Isotope
    $grid.isotope({ filter: filterValue })
  })

  // change is-checked class on filters
  $('.filter-group').each(function (i, filterGroup) {
    var $filterGroup = $(filterGroup)
    $filterGroup.on('click', '.filter', function (event) {
      $filterGroup.find('.is-checked').removeClass('is-checked')
      var $filter = $(event.currentTarget)
      $filter.addClass('is-checked')
    })
  })

  // document.querySelector('.projekt-wrapper.row').style.visibility = "visible";

  // flatten object by concatting values
  function concatValues(obj) {
    var value = ''
    for (var prop in obj) {
      value += obj[prop]
    }
    return value
  }
})
