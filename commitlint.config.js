module.exports = {
    extends: ['@commitlint/config-conventional'],
    rules: {
        'type-enum': [
            2,
            'always',
            [
                '[✨ feat]',
                '[🚧 WIP]',
                '[🐛 fix]',
                '[🔖 release]',
                '[🖌 CSS]',
                '[💬 text]',
                '[♻️ refactor]',
                '[🚑️ critical fix]',
                '[📝 docs]',
                '[🚀 perf]',
                '[💚 chores]',
                '[🧪 test]',
                '[👷 build]',
                '[🎉 New]',
                '[🏗️ archi]',
                '[🎨 styles]',
                '[⚙️ ci]',
                '[🔧 config]',
                '[🔀 merge]',
                '[🍱 assets]',
                '[👽️ external]',
                '[💩 ....]',
                '[📱 responsive]',
                '[🗑 clean]',
                '[👌 review]',
                '[🐋 docker]',
                '[🔍️ SEO]',
                '[👔 metier]',
                '[🥚 easter]',
                '[⚗️ POC]',
                '[🗃️ BDD]',
                '[⏪️ revert]',
                '[🚢 deploy]',
                '[📦️ package]',
                '[➕ add deps]',
                '[➖ remove deps]',
            ],
        ],
    },
};
