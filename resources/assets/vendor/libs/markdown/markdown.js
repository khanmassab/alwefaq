/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 1/5/20, 1:53 AM
 * Last Modified: 12/22/19, 10:14 PM
 * Project Name: Wafaq
 * File Name: markdown.js
 */

/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 12/22/19, 10:14 PM
 * Last Modified: 11/1/19, 5:58 PM
 *
 * File Name: markdown.js
 */

var MarkdownCls = require('markdown/lib/markdown.js');

var markdown = {
  Markdown: MarkdownCls,
  parse: MarkdownCls.parse,
  toHTML: MarkdownCls.toHTML,
  toHTMLTree: MarkdownCls.toHTMLTree,
  renderJsonML: MarkdownCls.renderJsonML
};

export { markdown };
