<template>
    <Head title="Home">
        <meta
            type="description"
            content="Home information"
            head-key="description"
        />
    </Head>
    <h1 class="text-4xl font-bold">Blog</h1>

    <pre>
        <code>
            class Example
            {
                public function __construct()
                {
                    //
                }
            }
        </code>
    </pre>
    <br />
    <div id="#example2">
        <pre>
            <code ref="code">
                class ExampleNew
                {
                    public function __construct()
                    {
                        //
                    }
                }
            </code>
        </pre>
    </div>
</template>

<script>
import { highlightElement, highlight } from '@/Services/SintaxHighlighting'
export default {
    mounted() {
        highlightElement(this.$refs.code)
    }
}
</script>
