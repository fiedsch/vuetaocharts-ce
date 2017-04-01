# Vuetao Charts -- Charts with Vue.js for Contao

## Usage

### 

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

