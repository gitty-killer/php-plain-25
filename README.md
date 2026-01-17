# php-plain-25

A small PHP tool that computes text statistics for plain.

## Goal
- Provide quick text metrics for plain documents.
- Report top word frequencies for fast inspection.

## Usage
php index.php data/sample.txt --top 5

## Output
- lines: total line count
- words: total word count
- chars: total character count
- top words: most frequent tokens (case-insensitive)

## Notes
- Only ASCII letters and digits are treated as word characters.
