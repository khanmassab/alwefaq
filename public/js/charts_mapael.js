/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 1/5/20, 1:52 AM
 * Last Modified: 12/22/19, 10:14 PM
 * Project Name: Wafaq
 * File Name: charts_mapael.js
 */

/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 12/22/19, 10:13 PM
 * Last Modified: 12/19/19, 10:37 PM
 *
 * File Name: charts_mapael.js
 */

$(function() {
  $('#mapael-example').mapael({
    map: {
      name: 'world_countries',
      defaultArea: {
        attrs: {
          fill: '#f4f4e8',
          stroke: '#ced8d0'
        },
        attrsHover: {
          fill: '#a4e100'
        }
      }
    }
  });
});
