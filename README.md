# Vuetao Charts -- Charts with Vue.js for Contao

## Overview 

The extension consists of two parts

* Code for dynamic SVG-charts with Vue.js (see https://github.com/fiedsch/vuetaocharts for the Vue.js components.
  Also make sure to visit https://vuejs.org and read the guide).
* A Contao content element that let's you embed the chart and provide the chart's data.

## Usage

The extension provides a new Contao content element.

* insert into article as usual
* edit the "data" field and provide the chart's data as JSON. Example:

```json
{
    "chart_data": [
        {
            "label": "Foo",
            "value": 61.1
        },
        {
            "label": "Bar",
            "value": 18.6
        },
        {
            "label": "Baz",
            "value": 20.3
        }
    ]
}
```

You may provide arbitrary additional data in the JSON data field which you can use to extend
the chart. 

An example für the donut chart:

```json
{
    "headline": "The Headline for the Chart",
    "chart_data": [ /* as above */ ]
}
```

Next you create a new  Contao template as usual (e.g. by cloning `ce_vtcdonut`). Make sure, your template's
name also starts with `ce_vtc`, which enables you to select it in your content element.


```html
<!-- unchanged parts like surrounding <div> and headline skipped here --> 
    <div id="app<?= $this->appid ?>">
        <div class="chart">
            <h2 v-text="headline"></h2> <!-- ADDED -->
            <vtc-donut
                :data="chartdata"
                :width="chartwidth"
                :height="chartheight"
                :chartrotation="chartrotation"
                @showinfo="showinfo"
            ></vtc-donut>
        </div>
    </div>

    <script>
        var data_from_contao = <?= $this->data; ?>;
        new Vue({
            el: '#app<?= $this->appid ?>',
            data: function () {
                return {
                    selected: 0,
                    chartdata: data_from_contao.chart_data,
                    chartwidth: <?= $this->svgwidth ?>,
                    chartheight: <?= $this->svgheight ?>,
                    chartrotation: 0, // no rotation. first segment starts at 12 o'clock
                    headline: data_from_contao.headline ? data_from_contao.headline : "" // ADDED
                }
            },
            methods: {
                showinfo: function (position) {
                    this.selected = position;
                }
            }
        });
  </script>

</div>
```






## Tips
 
### Moustache-Syntax vs. Contao Insert Tags

Vue's Mustache syntax (and https://vuejs.org/v2/guide/syntax.html#Text) and Contao's insert tags collide.
See e.g. https://github.com/contao/core/issues/7883 

To solve the issue, use
```html
 <div>[{] foo [}]</div>
```
where `[{]` and `[}]` will be replaced be  `{{` and `}}` respecitively by Contao</div>, or 
```html
<div v-text="foo"></div>
```
to avoid the usage of double braces in Contao templates.

