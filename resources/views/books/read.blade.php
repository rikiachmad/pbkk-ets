<x-main-layout>
    <div class="flex flex-col items-center">
        <div class="flex space-x-3 px-1 py-2 w-3/4 justify-between items-center">
            <button style="background-color: black" class="inline-flex p-2 bg-black-800 text-white rounded-md gap-2 hover:bg-black-900" id="prev-page"><i
                    data-feather="arrow-left"></i> Prev Page</button>
            <div class="flex flex-col space-y-1">
                <form action="/bookmark" method="POST" id="bookmark-form">
                    @csrf
                    <input type="hidden" name="book_id" value="{{ $book->id }}">
                    <input type="hidden" name="page" id="page" value="">
    
                    <button style="background-color: black" type="submit" class="bg-black-800 text-white text-sm rounded-md p-2 inline-flex items-center space-x-1 hover:bg-black-900"><i height="16" width="16" data-feather="bookmark"></i> Bookmark</button>
                </form>
                <span class="self-center" id="page-info">
                    Page <span id="page-num" onchange=""></span> of <span id="page-count"></span>
                </span>
            </div>
            <button style="background-color: black" class="inline-flex p-2 bg-black-800 text-white rounded-md gap-2 hover:bg-black-900" id="next-page">Next Page <i
                    data-feather="arrow-right"></i> </button>
            

        </div>

        <canvas id="pdf-render" class="w-3/4 mb-5"></canvas>
    </div>
    <script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>
    <script>
        const url = "{{asset('uploads/' . $book->link) }}";
        console.log(url);
        let pdfDoc = null, pageNum = {{ session('bookmark') ?? 1 }}, pageIsRendering = false, pageNumIsPending = null;
        const prev = document.querySelector('#prev-page');
        const next = document.querySelector('#next-page');
        const scale = 1.5,
            canvas = document.querySelector('#pdf-render'),
            ctx = canvas.getContext('2d');

        const page = document.querySelector('#page');

        const renderPage = num => {
            pageIsRendering = true;

            pdfDoc.getPage(num).then(page => {
                const viewport = page.getViewport({ scale });
                canvas.height = viewport.height;
                canvas.width = viewport.width;

                const renderCtx = {
                    canvasContext: ctx,
                    viewport
                }
                
                page.render(renderCtx).promise.then(() => {
                    pageIsRendering = false;
                    if(pageNumIsPending !== null) {
                        renderPage(pageNumIsPending);
                        pageNumIsPending = null;
                    }
                })

                document.querySelector('#page-num').textContent = num;
            
            })
        }

        const queueRenderPage = num => {
            if(pageIsRendering) {
                pageNumIsPending = num;
            }
            else {
                renderPage(num);
            }
        }

        const showPrevPage = () => {
            if(pageNum <= 1) {
                return;
            }

            prev.href = '?page=' + pageNum;

            pageNum--;
            page.value = pageNum;
            queueRenderPage(pageNum);
        }

        const showNextPage = () => {
            if(pageNum >= pdfDoc.numPages) {
                return;
            }

            pageNum++;
            page.value = pageNum;
            queueRenderPage(pageNum);
        }

        const progressCallback = function (progress) {
            let percentLoaded = progress.loaded / progress.total;
            console.log(progress);
        }

        const loadingTask = pdfjsLib.getDocument(url);

        loadingTask.onProgress = progress => {
            let percentLoaded = progress.loaded / progress.total;
            console.log(percentLoaded * 100 + "%");
        }

        loadingTask.promise.then(pdfDoc_ => {
            pdfDoc = pdfDoc_;
            document.querySelector('#page-count').textContent = pdfDoc.numPages;
            page.value = pageNum;
            renderPage(pageNum);
        }).catch(err => {
            const div = document.createElement('div');
            div.appendChild(document.createTextNode(err.message));
            document.querySelector('body').insertBefore(div, canvas);
        });

        prev.addEventListener('click', showPrevPage);
        next.addEventListener('click', showNextPage);

    </script>

</x-main-layout>