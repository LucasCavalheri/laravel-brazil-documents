import DefaultTheme from 'vitepress/theme'
import { h } from 'vue'
import AuthorFooter from './AuthorFooter.vue'
import './author-footer.css'

export default {
  extends: DefaultTheme,
  Layout() {
    return h(DefaultTheme.Layout, null, {
      'layout-bottom': () => h(AuthorFooter),
    })
  },
}
