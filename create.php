<?php
    session_start();
    include 'vendor/components/header.php';

    if(!isset($_SESSION['user'])){
      header("location: 404_angry.php");
    }
?>
<div class="container_block">
  <div class="page_add">
    <h2>Создание статьи</h2>
      <!-- <form action="" method="post">
          <div id="editor"></div>
          <button onclick="editor.save()">Save</button>
      </form> -->
      <!-- <div class="ce-example">
      <div class="ce-example__header">
        <a class="ce-example__header-logo" href="https://codex.so/editor">Editor.js 🤩🧦🤨</a>
      </div> -->
      <div class="ce-example__content _ce-example__content--small">
          <div id="editorjs"></div>
      </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/@editorjs/header@latest"></script><!-- Header -->
  <script src="https://cdn.jsdelivr.net/npm/@editorjs/simple-image@latest"></script><!-- Image -->
  <script src="https://cdn.jsdelivr.net/npm/@editorjs/delimiter@latest"></script><!-- Delimiter -->
  <script src="https://cdn.jsdelivr.net/npm/@editorjs/list@latest"></script><!-- List -->
  <script src="https://cdn.jsdelivr.net/npm/@editorjs/checklist@latest"></script><!-- Checklist -->
  <script src="https://cdn.jsdelivr.net/npm/@editorjs/quote@latest"></script><!-- Quote -->
  <script src="https://cdn.jsdelivr.net/npm/@editorjs/code@latest"></script><!-- Code -->
  <script src="https://cdn.jsdelivr.net/npm/@editorjs/embed@latest"></script><!-- Embed -->
  <script src="https://cdn.jsdelivr.net/npm/@editorjs/table@latest"></script><!-- Table -->
  <script src="https://cdn.jsdelivr.net/npm/@editorjs/link@latest"></script><!-- Link -->
  <script src="https://cdn.jsdelivr.net/npm/@editorjs/warning@latest"></script><!-- Warning -->

  <script src="https://cdn.jsdelivr.net/npm/@editorjs/marker@latest"></script><!-- Marker -->
  <script src="https://cdn.jsdelivr.net/npm/@editorjs/inline-code@latest"></script><!-- Inline Code -->

  <!-- Load Editor.js's Core -->
  <script src="https://cdn.jsdelivr.net/npm/@editorjs/editorjs@latest"></script>
  <script>
      /**
       * To initialize the Editor, create a new instance with configuration object
       * @see docs/installation.md for mode details
       */
      var editor = new EditorJS({
        /**
         * Enable/Disable the read only mode
         */
        readOnly: false,

        /**
         * Wrapper of Editor
         */
        holder: 'editorjs',

        /**
         * Common Inline Toolbar settings
         * - if true (or not specified), the order from 'tool' property will be used
         * - if an array of tool names, this order will be used
         */
        // inlineToolbar: ['link', 'marker', 'bold', 'italic'],
        // inlineToolbar: true,

        /**
         * Tools list
         */
        tools: {
          /**
           * Each Tool is a Plugin. Pass them via 'class' option with necessary settings {@link docs/tools.md}
           */
          header: {
            class: Header,
            inlineToolbar: ['marker', 'link'],
            config: {
              placeholder: 'Заголовок статьи'
            },
            shortcut: 'CMD+SHIFT+H'
          },

          /**
           * Or pass class directly without any configuration
           */
          image: SimpleImage,

          list: {
            class: List,
            inlineToolbar: true,
            shortcut: 'CMD+SHIFT+L'
          },

          checklist: {
            class: Checklist,
            inlineToolbar: true,
          },

          quote: {
            class: Quote,
            inlineToolbar: true,
            config: {
              placeholder: 'Заголовок статьи'
            },
            shortcut: 'CMD+SHIFT+O'
          },

          warning: Warning,

          marker: {
            class:  Marker,
            shortcut: 'CMD+SHIFT+M'
          },

          code: {
            class:  CodeTool,
            shortcut: 'CMD+SHIFT+C'
          },

          delimiter: Delimiter,

          inlineCode: {
            class: InlineCode,
            shortcut: 'CMD+SHIFT+C'
          },

          linkTool: LinkTool,

          embed: Embed,

          table: {
            class: Table,
            inlineToolbar: true,
            shortcut: 'CMD+ALT+T'
          },

          // image: {
          //   class: ImageTool,
          //   config: {
          //   }
          //   actions: [
          //     {
          //       name: 'new_button',
          //       icon: '<svg>...</svg>',
          //       title: 'New Button',
          //       toggle: true,
          //       action: (name) => {
          //           alert(`${name} button clicked`);
          //       }
          //     }
          //   ]
          // }
        },

        /**
         * This Tool will be used as default
         */
        // defaultBlock: 'paragraph',

        /**
         * Initial Editor data
         */
        data: {
          blocks: [
            {
              type: "header",
              data: {
                text: "",
                level: 1
              }
            },
            // {
            //   type: "paragraph",
            //   data: {
            //     // text: "Категория статьи",
            //     placeholder: "akfdksa"
            //   }
            // },
            // {
            //   type: 'image',
            //   data: {
            //     withBorder: true,
            //   }
            // },
          
      //       {
      //         type : 'paragraph',
      //         data : {
      //           text : ''
      //         }
      //       },
      //       {
      //         type: "header",
      //         data: {
      //           text: "Key features",
      //           level: 3
      //         }
      //       },
      //       {
      //         type : 'list',
      //         data : {
      //           items : [
      //             'It is a block-styled editor',
      //             'It returns clean data output in JSON',
      //             'Designed to be extendable and pluggable with a simple API',
      //           ],
      //           style: 'unordered'
      //         }
      //       },
      //       {
      //         type: "header",
      //         data: {
      //           text: "What does it mean «block-styled editor»",
      //           level: 3
      //         }
      //       },
      //       {
      //         type : 'paragraph',
      //         data : {
      //           text : 'Workspace in classic editors is made of a single contenteditable element, used to create different HTML markups. Editor.js <mark class=\"cdx-marker\">workspace consists of separate Blocks: paragraphs, headings, images, lists, quotes, etc</mark>. Each of them is an independent contenteditable element (or more complex structure) provided by Plugin and united by Editor\'s Core.'
      //         }
      //       },
      //       {
      //         type : 'paragraph',
      //         data : {
      //           text : `There are dozens of <a href="https://github.com/editor-js">ready-to-use Blocks</a> and the <a href="https://editorjs.io/creating-a-block-tool">simple API</a> for creation any Block you need. For example, you can implement Blocks for Tweets, Instagram posts, surveys and polls, CTA-buttons and even games.`
      //         }
      //       },
      //       {
      //         type: "header",
      //         data: {
      //           text: "What does it mean clean data output",
      //           level: 3
      //         }
      //       },
      //       {
      //         type : 'paragraph',
      //         data : {
      //           text : 'Classic WYSIWYG-editors produce raw HTML-markup with both content data and content appearance. On the contrary, Editor.js outputs JSON object with data of each Block. You can see an example below'
      //         }
      //       },
      //       {
      //         type : 'paragraph',
      //         data : {
      //           text : `Given data can be used as you want: render with HTML for <code class="inline-code">Web clients</code>, render natively for <code class="inline-code">mobile apps</code>, create markup for <code class="inline-code">Facebook Instant Articles</code> or <code class="inline-code">Google AMP</code>, generate an <code class="inline-code">audio version</code> and so on.`
      //         }
      //       },
      //       {
      //         type : 'paragraph',
      //         data : {
      //           text : 'Clean data is useful to sanitize, validate and process on the backend.'
      //         }
      //       },
      //       {
      //         type : 'delimiter',
      //         data : {}
      //       },
      //       {
      //         type : 'paragraph',
      //         data : {
      //           text : 'We have been working on this project more than three years. Several large media projects help us to test and debug the Editor, to make its core more stable. At the same time we significantly improved the API. Now, it can be used to create any plugin for any task. Hope you enjoy. 😏'
      //         }
      //       },
            //   {
            //     "type" : "image",
            //     "data" : {
            //       "caption" : "",
            //       "withBorder" : false,
            //       "withBackground" : false,
            //       "stretched" : true,
            //       actions: [
            //           {
            //               name: 'new_button',
            //               icon: '<svg>...</svg>',
            //               title: 'New Button',
            //               toggle: true,
            //               action: (name) => {
            //                   alert(`${name} button clicked`);
            //               }
            //           }
            //       ]
            //     }
            // },
          ]
        },
        onReady: function(){
          saveButton.click();
        },
        onChange: function(api, event) {
          console.log('something changed', event);
        }
      });

      /**
       * Saving button
       */
      const saveButton = document.getElementById('saveButton');

      /**
       * Toggle read-only button
       */
      const toggleReadOnlyButton = document.getElementById('toggleReadOnlyButton');
      const readOnlyIndicator = document.getElementById('readonly-state');

      /**
       * Saving example
       */
      saveButton.addEventListener('click', function () {
        editor.save()
          .then((savedData) => {
            cPreview.show(savedData, document.getElementById("output"));
          })
          .catch((error) => {
            console.error('Saving error', error);
          });
      });

      /**
       * Toggle read-only example
       */
      toggleReadOnlyButton.addEventListener('click', async () => {
        const readOnlyState = await editor.readOnly.toggle();

        readOnlyIndicator.textContent = readOnlyState ? 'On' : 'Off';
      });
  </script>
  </div>
</div>
<?php
    include 'vendor/components/footer.php';
?>