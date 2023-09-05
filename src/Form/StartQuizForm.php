<?php declare(strict_types = 1);

namespace Drupal\freak_quizzes\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a Freak Quizzes form.
 */
final class StartQuizForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId(): string {
    return 'freak_quizzes_start_quiz';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state): array {
    $current_user = \Drupal::currentUser();
    $user_name = $current_user->getAccountName();
    $user_email = $current_user->getEmail();

    $form['user_info'] = [
      '#markup' => $this->t('<h2>Hello @name, wellcome to Freak Quizzes.  </h2>', [
        '@name' => $user_name,
        '@email' => $user_email,
      ]),
    ];

    $form['actions'] = [
      '#type' => 'actions',
      'submit' => [
        '#type' => 'submit',
        '#value' => $this->t('Start Quiz'),
      ],
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state): void {
    // @todo Validate the form here.
    // Example:
    // @code
    //   if (mb_strlen($form_state->getValue('message')) < 10) {
    //     $form_state->setErrorByName(
    //       'message',
    //       $this->t('Message should be at least 10 characters.'),
    //     );
    //   }
    // @endcode
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state): void {
    $form_state->setRedirect('freak_quizzes.quiz');
  }

}
